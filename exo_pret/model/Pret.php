<?php
class Pret {
    private float $capital;
    private float $interetMensuel;
    private float $nbMois;

    public function __construct(float $_capital, float $_interet, float $_annee)
    {
        $this->capital = $_capital;
        $this->interetMensuel = $_interet/1200;
        $this->nbMois = $_annee*12;
    }
    public function calculMensualite()  : float
    {
        $mensualite=0;
        $Q = (1 - pow(1+  $this->interetMensuel, - $this->nbMois));
        $mensualite = ($this->capital*$this->interetMensuel)/$Q;
    
        return round($mensualite,2);
    
    }

    public function tableauAmortissement() : string
    {
        $chaineTab = '<table> <thead> <tr> <th>numero mois </th> <th> Part Interêt </th> <th> Part amortiseenment </th> <th> Capital restant dû </th> <th> Mensualité </th> </tr> </thead>';


         $nbMois=0;
         $partInteret=0;
         $partAmortissement=0;
         $capitalRestant=$this->capital;
        $mens=$this->calculMensualite();
        for ($i=0; $i <$this->nbMois ; $i++) { 
            $chaineTab.="<tr>";
            $nbMois= $i+1;
            $partInteret =$capitalRestant*$this->interetMensuel;
            $partAmortissement=$mens-$partInteret;
            if ($i>0){
                $capitalRestant -= $partAmortissement;
            }

            $chaineTab.="<td>".$nbMois."</td><td>".$partInteret."</td><td>".$partAmortissement."</td><td>".$capitalRestant."</td><td>".$mens."</td>";



            $chaineTab.= "</tr>";
        }
    }

    
       
}
