var wsAdminBarEditor = wsAdminBarEditor || {};

(function($) {

	/**
	 * This view-model represents a single Admin Bar menu node and its children.
	 *
	 * @param {Object} node Node properties
	 * @param {wsAdminBarEditor.NodeViewModel} [parentViewModel]
	 * @param {wsAdminBarEditor.ApplicationViewModel} [appViewModel]
	 * @constructor
	 */
	wsAdminBarEditor.NodeViewModel = function(node, parentViewModel, appViewModel) {
		if (typeof parentViewModel === 'undefined') {
			parentViewModel = null;
		}
		if (typeof appViewModel === 'undefined') {
			appViewModel = null;
		}

		var self = this;

		this.id = ko.observable(node.id);
		this.group = ko.observable(node.group);
		this.parentId = (typeof node['parent'] !== 'undefined') ? node.parent : null;
		this.parent = ko.observable(parentViewModel);
		this.children = ko.observableArray([]);

		this.is_custom = ko.observable(typeof node['is_custom'] !== 'undefined' ? node.is_custom : false);
		this.is_hidden = ko.observable(typeof node['is_hidden'] !== 'undefined' ? node.is_hidden : false);
		this.is_visible = ko.computed({
			read: function() {
				return !self.is_hidden();
			},
			write: function(value) {
				self.is_hidden(!value);
			},
			owner: self
		});

		//Wrap id() with a computed observable to prevent the user from entering an invalid ID.
		this.effectiveId = ko.computed({
			read: self.id,
			write: function(value) {
				//The ID must not be a non-empty string.
				value = '' + value;
				if (value === '') {
					//Trigger an update that will revert any associated inputs to the original value.
					self.id.valueHasMutated();
					return;
				}

				//Each node must have a unique ID.
				if (appViewModel) {
					var duplicate = appViewModel.findNodeById(value, self);
					if (duplicate) {
						self.id.valueHasMutated();
						return;
					}
				}

				self.id(value);
			},
			owner: this
		});

		this.defaults = typeof node['defaults'] !== 'undefined' ? node.defaults : {};

		this.hasDefault = function(propertyName) {
			return typeof self.defaults[propertyName] !== 'undefined';
		};
		this.getDefault = function(propertyName) {
			return self.hasDefault(propertyName) ? self.defaults[propertyName] : null;
		};
		this.isDefault = function(propertyName) {
			return self.hasDefault(propertyName) && (self[propertyName]() === null);
		};
		//noinspection JSUnusedGlobalSymbols
		this.canBeReset = function(propertyName) {
			return self.hasDefault(propertyName) && !self.isDefault(propertyName);
		};
		//noinspection JSUnusedGlobalSymbols
		this.resetToDefault = function(model, event) {
			var target = event.target || event.srcElement;
			var propertyName = $(target).data('fieldName');
			if ( propertyName && self.hasDefault(propertyName) ) {
				self[propertyName](null);
			}
		};

		var propertiesWithDefaults = [
			'title', 'href', 'html', 'class', 'onclick',
			'target', 'titleAttr', 'tabindex'
		];
		function capitaliseFirstLetter(string) {
			return string.charAt(0).toUpperCase() + string.slice(1);
		}

		for (var i = 0; i < propertiesWithDefaults.length; i++) {
			var name = propertiesWithDefaults[i];

			this[name] = ko.observable(typeof node[name] !== 'undefined' ? node[name] : null);
			this['effective' + capitaliseFirstLetter(name)] = ko.computed(
				makeObservableWithDefault(name)
			);
		}

		function makeObservableWithDefault(name) {
			return {
				read: function() {
					return self[name]() !== null ? self[name]() : self.getDefault(name);
				},
				write: function(value) {
					var defaultValue = self.getDefault(name);
					var valueMatchesDefault = (value === defaultValue) ||
						(defaultValue === null && value === '');

					if (self[name]() !== null || !valueMatchesDefault) {
						self[name](value);
					}
				},
				owner: self
			};
		}

		//This observable controls whether the node settings panel is visible.
		this.settingsVisible = ko.observable(false);
		//noinspection JSUnusedGlobalSymbols
		this.toggleSettings = function() {
			self.settingsVisible( !self.settingsVisible() );
			return false;
		};

		//This is the node editor header title. Some items don't have a title (e.g. groups)
		//or have a title that contain HTML, so we can't just use effectiveTitle() here.
		//noinspection JSUnusedGlobalSymbols
		this.safeTitle = ko.computed(function() {
			if (self.group()) {
				return self.id();
			}

			var title = self.effectiveTitle();
			if (!title) {
				title = '';
			}
			//Strip tags.
			title = title.replace(/<[^>]*>?/gm, '');

			if (title.length < 2) {
				title = self.id();
			}
			return title;
		}, self);

		this.selected = ko.observable(false);

		//Expand/collapse children nodes.
		var isExpanded = ko.observable(false);
		this.expanded = ko.computed({
			read: function() {
				//Nodes with no children are always "expanded". This is necessary to allow dropping
				//items under these nodes. nestedSortable doesn't let you drag stuff to invisible lists.
				return isExpanded() || (self.children().length == 0);
			},
			write: isExpanded,
			owner: self
		});


		//noinspection JSUnusedGlobalSymbols
		this.toggleExpand = function(node, event) {
			var newState = !self.expanded();

			if (typeof event['shiftKey'] !== 'undefined' && event.shiftKey) {
				//Expand/collapse all children.
				toggleAll(self, newState)
			} else {
				//Expand/collapse just this node.
				self.expanded(newState);
			}

			function toggleAll(node, state) {
				node.expanded(state);
				for(var i = 0; i < node.children().length; i++) {
					toggleAll(node.children()[i], state);
				}
			}

		};

		//Convert the node to a plain old JS object. Useful for JSON serialisation.
		this.toJs = function() {
			var plainNode = {};

			var observablesToMap = [
				'id', 'group', 'title', 'href', 'html', 'class',
				'onclick', 'target', 'titleAttr', 'tabindex',
				'is_custom', 'is_hidden'
			];
			$.each(observablesToMap, function(index, name) {
				var value = self[name]();
				if (value !== null) {
					plainNode[name] = self[name]();
				}
			});
			plainNode.defaults = self.defaults;

			plainNode.children = [];
			$.each(self.children(), function(index, child) {
				plainNode.children.push(child.toJs());
			});

			return plainNode;
		};

		//Create view models for all children, too.
		if ((typeof node['children'] !== 'undefined') && (node.children.length > 0)) {
			var tempChildren = [];
			$.each(node.children, function(index, child) {
				tempChildren.push(new wsAdminBarEditor.NodeViewModel(child, self, appViewModel));
			});
			this.children(tempChildren);
		}
	};

})(jQuery);
