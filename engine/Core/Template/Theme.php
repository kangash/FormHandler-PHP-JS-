<?php 

namespace Engine\Core\Template;



class Theme
{
    const MASK_TEMPLATE_FILE = 'catalog\\View\\theme\\%s.php';
    /**
     * @var array
     */
    protected static $data = [];

    public function setData($data)
    {
        $this->data = $data;
    }

    public function builder($callPath = '', array $data = [])
    {
        if ($callPath !== '') {
            return $this->load($callPath, $data);
        } 
        return $this->themeException($callPath);
    }

    public function load($callPath, array $data)
    {
        $templateFile = sprintf(self::MASK_TEMPLATE_FILE, $callPath);

        $datas = array_merge($this->data, $data);
        extract($datas);

        if (file_exists($templateFile)) {
            require $templateFile;
            return true;
        } else {
            throw new \Exception(
                sprintf('View file %s does nod exist!', $templateFile)
            );
            return false;
        }

    }

    public function themeException($callPath)
    {
        throw new \Exception(
            sprintf('You didn\'t enter a file name: \'%s\'.', $callPath)
        );
    }





}

?>
