<?php

// Dados de conexão com o PostgreSQL
$host = 'localhost';
$port = '5432';
$dbname = 'nome_do_banco';
$user = 'usuario';
$password = 'senha';

// Conexão com o PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Consulta na tabela "justica"
$query = "SELECT * FROM justica";
$result = pg_query($conn, $query);

function insertJustica($nu_processo, 
$nm_autor, 
$nm_municipio,
$nm_reu,
$nm_juiz,
$nm_edital,
$nm_doe,
$nm_publicacao,
$nm_vara,
$nm_exequente,
$nm_executada,
$nm_horaleilao,
$nm_valoravaliacao,
$nm_porcentagem,
$nm_acao,
$nm_praca,
$nm_observacao,
$usuario_id_logado,
$nm_ip,
$nm_comarca,
$nu_hasta,
$vl_debito,
$nm_cpfoucnpjexequente,
$nm_cpfoucnpjexecutada,
$nm_fieldepositario,
$nm_cpfoucnpjfieldepositario,
$dt_atualizacaodebito,
$nm_linkprocesso,
$nm_avaliacaojudicial,
$nm_dataavaliacaojudicial,
$nm_onus){
    $sql = `INSERT INTO justica (nu_processo, 
    nm_autor, 
    nm_municipio,
    nm_reu,
    nm_juiz,
    nm_edital,
    nm_doe,
    nm_publicacao,
    nm_vara,
    nm_exequente,
    nm_executada,
    nm_horaleilao,
    nm_valoravaliacao,
    nm_porcentagem,
    nm_acao,
    nm_praca,
    nm_observacao,
    usuario_id_logado,
    nm_ip,
    nm_comarca,
    nu_hasta,
    vl_debito,
    nm_cpfoucnpjexequente,
    nm_cpfoucnpjexecutada,
    nm_fieldepositario,
    nm_cpfoucnpjfieldepositario,
    dt_atualizacaodebito,
    nm_linkprocesso,
    nm_avaliacaojudicial,
    nm_dataavaliacaojudicial,
    nm_onus) VALUES (
        $nu_processo, 
        $nm_autor, 
        $nm_municipio,
        $nm_reu,
        $nm_juiz,
        $nm_edital,
        $nm_doe,
        $nm_publicacao,
        $nm_vara,
        $nm_exequente,
        $nm_executada,
        $nm_horaleilao,
        $nm_valoravaliacao,
        $nm_porcentagem,
        $nm_acao,
        $nm_praca,
        $nm_observacao,
        $usuario_id_logado,
        $nm_ip,
        $nm_comarca,
        $nu_hasta,
        $vl_debito,
        $nm_cpfoucnpjexequente,
        $nm_cpfoucnpjexecutada,
        $nm_fieldepositario,
        $nm_cpfoucnpjfieldepositario,
        $dt_atualizacaodebito,
        $nm_linkprocesso,
        $nm_avaliacaojudicial,
        $nm_dataavaliacaojudicial,
        $nm_onus
    )`; 
}


// Loop "for" para inserir novas linhas na tabela "justica"
for ($i = 0; $i < 10; $i++) {
    $valor1 = "valor1_" . $i;
    $valor2 = "valor2_" . $i;
    $valor3 = "valor3_" . $i;
    $query = "INSERT INTO justica (campo1, campo2, campo3) VALUES ('$valor1', '$valor2', '$valor3')";
    pg_query($conn, $query);
}



// Fechar a conexão com o PostgreSQL
pg_close($conn);
