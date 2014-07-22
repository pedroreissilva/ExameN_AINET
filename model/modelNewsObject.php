<?php




class model_modelNewsObject {
    private $id;
    private $seccao;
    private $titulo;
    private $resumo;
    private $corpo;
    private $updated_at;
    private $created_at;
    private $imagem;

    function __construct($corpo, $created_at, $id, $resumo, $seccao, $titulo, $updated_at, $imagem){
        $this->corpo = $corpo;
        $this->created_at = $created_at;
        $this->id = $id;
        $this->resumo = $resumo;
        $this->seccao = $seccao;
        $this->titulo = $titulo;
        $this->updated_at = $updated_at;
        $this->imagem = $imagem;
    }

    /**
     * @return mixed
     */
    public function getCorpo()
    {
        return $this->corpo;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getResumo()
    {
        return $this->resumo;
    }

    /**
     * @return mixed
     */
    public function getSeccao()
    {
        return $this->seccao;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }




}

?>