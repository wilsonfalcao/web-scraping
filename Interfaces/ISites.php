<?php 

interface ISites{

    public function URLAddress();
    public function Authorization();
    public function Extract($HTML);
    public function SetRules($propirty, $iniRule, $endRule);
}