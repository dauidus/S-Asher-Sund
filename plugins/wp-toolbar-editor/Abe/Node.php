<?php
/**
 * A wrapper for WordPress Toolbar/Admin Bar nodes.
 *
 * @property string $title
 * @property string $href
 *
 * @property string $html
 * @property string $class
 * @property string $onclick
 * @property string $target
 * @property string $titleAttr
 * @property int $tabindex
 */
class Abe_Node {
	public $id;

	public $group = false;
	public $parent = null;

	public $is_custom = false;
	public $is_hidden = false;

	protected $settings = array();
	protected $defaults = array(
		'title'     => 'Default Title',
		'href'      => '',
		'class'     => '',
		'html'      => null,
		'onclick'   => null,
		'target'    => null,
		'titleAttr' => null,
		'tabindex'  => null,
	);

	protected function __construct($id, $group = false) {
		$this->id = $id;
		$this->group = $group;
	}

	public function __get($name) {
		if ( isset($this->settings[$name]) ) {
			return $this->settings[$name];
		} else if ( array_key_exists($name, $this->defaults) ) {
			return $this->defaults[$name];
		} else {
			return null;
		}
	}

	public function __set($name, $value) {
		$this->settings[$name] = $value;
	}

	/**
	 * Get node properties as an argument array that can be passed to WP_Admin_Bar::add_node().
	 *
	 * @return array
	 */
	public function toNodeArgs() {
		$args = array(
			'id'     => $this->id,
			'title'  => $this->title,
			'parent' => $this->parent,
			'href'   => $this->href,
			'group'  => $this->group,
			'meta'   => array(
				'html'    => $this->html,
				'class'   => $this->class,
				'onclick' => $this->onclick,
				'title'   => $this->titleAttr,
				'target'  => $this->target,
				'tabindex' => $this->tabindex,
			),
		);
		$args = array_filter($args, array(__CLASS__, 'isNotNull'));
		$args['meta'] = array_filter($args['meta'], array(__CLASS__, 'isNotNull'));

		return $args;
	}

	/**
	 * Create a node from a WP admin bar node instance.
	 *
	 * @param StdClass $nodeArgs
	 * @return Abe_Node
	 */
	public static function fromNodeArgs($nodeArgs) {
		$nodeArgs = (object) $nodeArgs;
		$isGroup = property_exists($nodeArgs, 'group') ? $nodeArgs->group : false;
		$node = new self($nodeArgs->id, $isGroup);
		$node->parent = isset($nodeArgs->parent) ? $nodeArgs->parent : null;
		$node->setDefaultsFromNodeArgs($nodeArgs);
		return $node;
	}


	/**
	 * Set node defaults based on an admin bar node.
	 *
	 * @param StdClass|array $args
	 */
	public function setDefaultsFromNodeArgs($args) {
		$defaults = is_object($args) ? get_object_vars($args) : $args;

		//Bring "meta" arguments to the base level.
		if ( isset($defaults['meta']) && is_array($defaults['meta']) ) {
			$meta = $defaults['meta'];

			//Rename "title" (i.e. title attribute) to "titleAttr" to prevent conflict
			//with the existing "title" argument that specifies the menu title.
			if ( isset($meta['title']) ) {
				$meta['titleAttr'] = $meta['title'];
				unset($meta['title']);
			}

			$defaults = array_merge($defaults, $meta);
			unset($defaults['meta']);
		}

		$this->defaults = array_merge($this->defaults, $defaults);
	}

	protected static function isNotNull($value) {
		return $value !== null;
	}

	/**
	 * Retrieve node properties as a simple associative array.
	 * This is useful for storage and serialization to JSON.
	 */
	public function toArray() {
		$properties = get_object_vars($this);
		unset($properties['settings']);
		$properties = array_merge($properties, $this->settings);
		return $properties;
	}

	/**
	 * @param array $properties
	 * @return Abe_Node
	 */
	public static function fromArray($properties) {
		if ( is_object($properties) ) {
			$properties = get_object_vars($properties);
		}
		if ( isset($properties['defaults']) && is_object($properties['defaults']) ) {
			$properties['defaults'] = get_object_vars($properties['defaults']);
		}
		$node = new self($properties['id'], isset($properties['group']) ? $properties['group'] : false);
		foreach($properties as $name => $value) {
			$node->$name = $value;
		}
		return $node;
	}

	/**
	 * Convert a list of nodes to an associative array of arrays.
	 * This is pretty much equivalent to calling toArray() on every node.
	 *
	 * @param Abe_Node[]|StdClass[] $nodes A list of Abe_Node instances or node argument objects.
	 * @return array An array of node property arrays, indexed by node ID.
	 */
	public static function nodeListToArray($nodes) {
		$output = array();
		foreach($nodes as $node) {
			if ( !($node instanceof self) ) {
				$node = self::fromNodeArgs($node);
			}
			$output[$node->id] = $node->toArray();
		}
		return $output;
	}
}