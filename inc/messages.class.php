<?php

defined( 'WPINC' ) || die;

if ( ! class_exists( 'GAOO_Messages' ) ):

	class GAOO_Messages extends GAOO_Singleton {
		private $message_container;
		private $message_item_container;

		/**
		 * BestLMS_Flash_Message constructor.
		 */
		protected function __construct() {
			$this->setMessageContainer( '<div class="notice notice-%1$s is-dismissable">%2$s</div>' );
			$this->setItemContainer( '<p>%1$s</p>' );
		}

		/**
		 * Adds a new message.
		 *
		 * @param string $type          Optional. Type of this message.
		 * @param string|array $message Array with messages or a message as string.
		 *
		 * @return bool If message stored true, otherwise false.
		 */
		private function add( $message, $type ) {
			if ( empty( $type ) || empty( $message ) ) {
				return false;
			}

			// Add the type to array, if key not exists
			if ( ! $this->hasType( $type ) ) {
				$_SESSION[ GAOO_PREFIX ]['messages'][ $type ] = array();
			}

			if ( is_array( $message ) ) {
				$_SESSION[ GAOO_PREFIX ]['messages'][ $type ] = array_merge( $_SESSION[ GAOO_PREFIX ]['messages'][ $type ], $message );
			} else {
				$_SESSION[ GAOO_PREFIX ]['messages'][ $type ][] = $message;
			}

			return true;
		}

		public function addSuccess( $message ) {
			return $this->add( $message, 'success' );
		}

		public function addError( $message ) {
			return $this->add( $message, 'error' );
		}

		public function addInfo( $message ) {
			return $this->add( $message, 'info' );
		}

		public function addWarning( $message ) {
			return $this->add( $message, 'warning' );
		}


		/**
		 * Check if a specific type is in the flash messages.
		 *
		 * @param string $type The flash message type
		 *
		 * @return bool|null True if type is set, otherwise false. Null if the type is wrong.
		 */
		private function hasType( $type = null ) {
			if ( empty( $type ) ) {
				return ! empty( $_SESSION[ GAOO_PREFIX ]['messages'] );
			}

			return ! empty( $_SESSION[ GAOO_PREFIX ]['messages'][ $type ] );
		}

		public function hasSuccess() {
			return $this->hasType( 'success' );
		}

		public function hasError() {
			return $this->hasType( 'error' );
		}

		public function hasInfo() {
			return $this->hasType( 'info' );
		}

		public function hasWarning() {
			return $this->hasType( 'warning' );
		}

		/**
		 * Check if any message is set.
		 *
		 * @return bool true if messages available, otherwise false.
		 */
		public function hasMessages() {
			return $this->hasType();
		}

		/**
		 * Returns the stored messages.
		 *
		 * @param string|null $type Optional. If not given, returns all messages. If set, only messages of this type will be returned.
		 *
		 * @return array|null Null if nothing found. Otherwise a array with all messages.
		 */
		public function getMessages() {
			return $this->getMessage();
		}

		private function getMessage( $type = null ) {
			if ( ! $this->hasMessages() ) {
				return null;
			}

			if ( empty( $type ) ) {
				return $_SESSION[ GAOO_PREFIX ]['messages'];
			}

			return $_SESSION[ GAOO_PREFIX ]['messages'][ $type ];
		}

		public function getSuccess() {
			return $this->getMessage( 'success' );
		}

		public function getError() {
			return $this->getMessage( 'error' );
		}

		public function getInfo() {
			return $this->getMessage( 'info' );
		}

		public function getWarning() {
			return $this->getMessage( 'warning' );
		}

		/**
		 * Clears all messages or just messages according to the type.
		 *
		 * @param null|string $type Optional. If not given all messages will be cleared, otherwise just the messages of the given type.
		 *
		 * @return bool True on success, otherwise false.
		 */
		public function clear() {
			return $this->clearType();
		}

		private function clearType( $type = null ) {
			if ( empty( $type ) ) {
				unset( $_SESSION[ GAOO_PREFIX ]['messages'] );

				return true;
			}

			unset( $_SESSION[ GAOO_PREFIX ]['messages'][ $type ] );

			return true;
		}

		public function clearSuccess() {
			return $this->clearType( 'success' );
		}

		public function clearError() {
			return $this->clearType( 'error' );
		}

		public function clearWarning() {
			return $this->clearType( 'warning' );
		}

		public function clearInfo() {
			return $this->clearType( 'info' );
		}

		/**
		 * Render the HTML-Code for the flash messages.
		 *
		 * @param null|string $type Optional. If only messages from a certain type needed. Otherwise all types will be returned.
		 * @param bool $echo        Optional. True will echo the HTML-Code. Otherwise it will be returned.
		 *
		 * @return string Return the HTML-Code if $echo set to false.
		 */
		private function renderType( $type = null ) {
			if ( ! $this->hasMessages() ) {
				return '';
			}

			if ( is_null( $type ) ) {
				// Render all messages
				$html     = '';
				$messages = $this->getMessages();

				foreach ( $messages as $type => &$messages ) {
					$html .= sprintf( $this->getMessageContainer(), $type . ' gaoo-messages', $this->renderItems( $messages ) );
				}

			} else {
				// Render only specific type
				$html = sprintf( $this->getMessageContainer(), $type . ' gaoo-messages', $this->renderItems( $this->getMessages( $type ) ) );
			}

			$this->clear();

			return $html;
		}

		public function render( $echo = false ) {
			if ( empty( $echo ) ) {
				return $this->renderType();
			}

			echo $this->renderType();
		}

		public function renderSuccess( $echo = false ) {
			if ( empty( $echo ) ) {
				return $this->renderType( 'success' );
			}

			echo $this->renderType( 'success' );
		}


		public function renderError( $echo = false ) {
			if ( empty( $echo ) ) {
				return $this->renderType( 'error' );
			}

			echo $this->renderType( 'error' );
		}

		public function renderInfo( $echo = false ) {
			if ( empty( $echo ) ) {
				return $this->renderType( 'info' );
			}

			echo $this->renderType( 'info' );
		}

		public function renderWarning( $echo = false ) {
			if ( empty( $echo ) ) {
				return $this->renderType( 'warning' );
			}

			echo $this->renderType( 'warning' );
		}

		/**
		 * Returns the HTML-Code for message container.
		 *
		 * @return string HTML-Code
		 */
		public function getMessageContainer() {
			return $this->message_container;
		}

		/**
		 * Set the HTML-Code for the message container.<br/>
		 * <strong>Example:</strong> &lt;div class="%1$s">&lt;ul>%2$s&lt;/ul>&lt;/div>
		 *
		 * @param string $html HTML-Code
		 */
		public function setMessageContainer( $html ) {
			$this->message_container = $html;
		}

		/**
		 * Returns the HTML-Code for the item, inside of the message container.
		 *
		 * @return string HTML-Code
		 */
		public function getItemContainer() {
			return $this->message_item_container;
		}

		/**
		 * Set the HTML-Code for the item, inside of the message container.<br/>
		 * <strong>Example:</strong> &lt;li>%1$s&lt;/li>
		 *
		 * @param string $html HTML-Code
		 */
		public function setItemContainer( $html ) {
			$this->message_item_container = $html;
		}


		/**
		 * Returns the generated HTML-Code as a string
		 *
		 * @return string HTML-Code
		 */
		public function __toString() {
			return $this->render();
		}

		/**
		 * Render the items of the flash message.
		 *
		 * @param array $messages Array with all messages
		 *
		 * @return string HTML-Code with rendered items.
		 */
		private function renderItems( &$messages ) {
			$html = '';

			foreach ( $messages as $message ) {
				$html .= sprintf( $this->getItemContainer(), $message );
			}

			return $html;
		}
	}

endif;