<?php
namespace p2ee\Partlets;

use p2ee\Preparables\Preparable;

abstract class Partlet implements Preparable {

    protected static $ENDPOINT_ENABLED = false;

    /**
     * @var
     */
    protected $deactivationInfo = [];

    /**
     * @var bool
     */
    protected $isDeactivated = false;

    public function inject($key, $value) {
        if ($value == null) {
            return;
        }

        $vars = get_class_vars(static::class);
        if (!array_key_exists($key, $vars)) {
            throw new \Exception('Parameter ' . $key . ' not there');
        }

        if (is_array($this->{$key})) {
            $this->{$key}[] = $value;
        } else {
            $this->{$key} = $value;
        }
    }

    public function isPrefilled($key) {
        $vars = get_class_vars(static::class);
        if (!array_key_exists($key, $vars)) {
            throw new \Exception('Parameter ' . $key . ' not there');
        }

        if (is_array($this->{$key}) || $vars[$key] === $this->{$key}) {
            return false;
        } else {
            return true;
        }
    }

    public function getTemplate() {
        return $this->getFilePart('html');
    }

    public function getView() {
        return $this->getFilePart('js');
    }

    public function getStyle() {
        return $this->getFilePart('scss');
    }

    protected function getFilePart($extension) {
        $fileName = $this->getModuleName() . '/' . $this->getBaseName() . '.' . $extension;
        if (file_exists($this->getRootFolder() . '/' . $fileName)) {
            return $fileName;
        }
        return null;
    }

    public function getId() {
        return $this->generateId(static::class);
    }

    public function getData() {
        return [];
    }

    protected function getBaseName() {
        $this->getModuleName();
        $parts = explode('\\', static::class);
        return array_pop($parts);
    }

    protected function getModuleName() {
        $className = trim(static::class, '\\');
        $baseNS = trim($this->getBaseNamespace(), '\\');
        $clean = str_replace($baseNS . '\\', '', $className);
        $parts = explode('\\', $clean);
        array_pop($parts);
        return implode('/', $parts);
    }

    protected function generateId($baseKey, array $uniqeParts = []) {
        $string = (string)$baseKey;
        $string .= implode('-', $uniqeParts);

        return str_replace(['\\', '_', ' '], '-', $string);
    }

    public function deactivatePartlet($info) {
        $this->isDeactivated = true;
        $this->deactivationInfo[] = $info;
    }

    public function isDeactivated(){
        return $this->isDeactivated;
    }

    public function getDeactivationInfo(){
        return $this->deactivationInfo;
    }

    public function handleEndpoint(){

    }

    public function isEndpointEnabled(){
        return self::$ENDPOINT_ENABLED;
    }

    abstract public function getContainerPartlet();

    abstract public function getBaseNamespace();

    abstract public function getRootFolder();
}
