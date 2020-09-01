<?php
    session_start();
    foreach ($_POST['produto'] as $key => $value) {
        $_SESSION['produto'][$key]['qtd'] = $value;
    }

$corpo ='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Novo Pedido</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.min.css"> -->
        <script src="https://kit.fontawesome.com/86360ad239.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <div class="container">
            <h1 style="text-decoration: underline;text-align: center;">Novo Pedido Delivery Maroto</h1>
            <br>
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Quantidade</th>
                <th scope="col">Pedido</th>
                <th scope="col">Valor Unitário</th>
                <th scope="col">total</th>
                </tr>
            </thead>
            <tbody>';
                    $total = 0;
                    foreach ($_SESSION['produto'] as $key => $value) {
                        $total += ($value['valor'] * $value['qtd']);
                 
                        $corpo .= '<tr scope="row">';
                        
                        $corpo .=     '<td>' .  $value['qtd'] . '</td>';
                        $corpo .=     '<td>' .  $value['nome'] .'  </td>';
                        $corpo .=     '<td> R$ ' . $value['valor'] .'  </td>';
                        $corpo .=     '<td> R$ ' . $value['valor'] * $value['qtd'] .'  </td>';
                        $corpo .= '</tr>';
                
                    };
            $corpo .= '</tbody>
            </table>
            <hr/>
            <div class="form-group" style="text-align: right;">';
            $corpo .=     '<span style="font-weight: bold;">Total: R$ '.  $total .' </span>';
            $corpo .= '</div>';

            $corpo .= '<h2 style="text-decoration: underline;text-align: center;">Dados para Entrega</h2>
            <br>';
            $corpo .= '<p>Nome: ' .  $_POST['nome'] .'</p>';
            $corpo .= '<p>Telefone: ' .  $_POST['telefone'] . '</p>';
            $corpo .= '<p>CEP: ' .  $_POST['cep'] . '</p>';
            $corpo .= '<p>Endereço: ' .  $_POST['endereco'] . '</p>';
            $corpo .= '<p>Forma da Pagamento: ' . ( $_POST['forma_pagamento'] == 'c' ? 'Cartão' : 'Dinheiro') . '</p>';
            $corpo .= '<p>Troco Para: ' .  ($_POST['troco'] ? 'R$: ' . $_POST['troco'] : '' ) . '</p>';
            $corpo .= '<p>Observações: ' .  $_POST['observacoes'] . '</p>';
            $corpo .='</div>
                    </body>
                    </html>';

// função para envio de email, parametros: para, de, nome, assunto, corpo
echo smtpmailer('XXXXXXX', 'XXXXXXXX', 'XXXXXXX', 'XXXXXXX', $corpo);
        
    function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
        global $error;
        require_once('PHPMailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();		                                    // Ativar SMTP
        $mail->SMTPDebug = 0;		                                // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
        $mail->SMTPAuth = true;		                                // Autenticação ativada
        $mail->SMTPSecure = 'ssl';	                                // SSL REQUERIDO pelo GMail
        $mail->Host = 'smtp.gmail.com';	                            // SMTP utilizado
        $mail->Port = 465;  		                                // A porta 465 deverá estar aberta em seu servidor
        $mail->SMTPDebug = 1;
        $mail->IsHTML(true);                                        // Define que a mensagem poderá ter formatação HTML
        $mail->CharSet    = "utf-8";                                // Define que a codificação do conteúdo da mensagem será utf-8
        $mail->Username = 'XXXXXXXX';     // Email para configuração do SMTP
        $mail->Password = 'XXXXXXX';                               // Senha do Email
        $mail->SetFrom($de);
        $mail->Subject = $assunto;
        $mail->Body = $corpo;
        $mail->AddAddress($para);
        if(!$mail->Send()) {
            $error = 'Mail error: '.$mail->ErrorInfo; 
            return $error;
        } else {
            $error = 'Mensagem enviada!';

            session_destroy();
            header('Location: index.php');
        }
    }
?>
