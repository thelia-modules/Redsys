<?php
/*************************************************************************************/
/*                                                                                   */
/*      This file is not free software                                               */
/*                                                                                   */
/*      Copyright (c) Franck Allimant, CQFDev                                        */
/*      email : thelia@cqfdev.fr                                                     */
/*      web : http://www.cqfdev.fr                                                   */
/*                                                                                   */
/*************************************************************************************/

/**
 * Created by Franck Allimant, CQFDev <franck@cqfdev.fr>
 * Date: 05/03/2016 19:05
 */

namespace Redsys\Api;

class Messages
{
    private static $messages = [
        // -- Error codes ----------------------------------------------------------------------------------------------

        'SIS0007' => array(
            'code' => 'SIS0007',
            'message' => 'Error al desmontar XML de entrada',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0008' => array(
            'code' => 'SIS0008',
            'message' => 'Ds_Merchant_MerchantCode Falta el campo',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0009' => array(
            'code' => 'SIS0009',
            'message' => 'Ds_Merchant_MerchantCode Error de formato',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0010' => array(
            'code' => 'SIS0010',
            'message' => 'Ds_Merchant_Terminal Falta el campo',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0011' => array(
            'code' => 'SIS0011',
            'message' => 'Ds_Merchant_Terminal Error de formato',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0014' => array(
            'code' => 'SIS0014',
            'message' => 'Ds_Merchant_Order Error de formato',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0015' => array(
            'code' => 'SIS0015',
            'message' => 'Ds_Merchant_Currency Falta el campo',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0016' => array(
            'code' => 'SIS0016',
            'message' => 'Ds_Merchant_Currency Error de formato',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0018' => array(
            'code' => 'SIS0018',
            'message' => 'Ds_Merchant_Amount Falta el campo',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0019' => array(
            'code' => 'SIS0019',
            'message' => 'Ds_Merchant_Amount Error de formato',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0020' => array(
            'code' => 'SIS0020',
            'message' => 'Ds_Merchant_Signature Falta el campo',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0021' => array(
            'code' => 'SIS0021',
            'message' => 'Ds_Merchant_Signature Campo sin datos',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0022' => array(
            'code' => 'SIS0022',
            'message' => 'Ds_TransactionType Error de formato',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0023' => array(
            'code' => 'SIS0023',
            'message' => 'Ds_TransactionType Valor desconocido',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0024' => array(
            'code' => 'SIS0024',
            'message' => 'Ds_ConsumerLanguage Valor excede de 3 posiciones',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0025' => array(
            'code' => 'SIS0025',
            'message' => 'Ds_ConsumerLanguage Error de formato',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0026' => array(
            'code' => 'SIS0026',
            'message' => 'Ds_Merchant_MerchantCode Error No existe el comercio / Terminal enviado',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0027' => array(
            'code' => 'SIS0027',
            'message' => 'Ds_Merchant_Currency Error moneda no coincide con asignada para ese Terminal.',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0028' => array(
            'code' => 'SIS0028',
            'message' => 'Ds_Merchant_MerchantCode Error Comercio/Terminal está dado de baja',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0030' => array(
            'code' => 'SIS0030',
            'message' => 'Ds_TransactionType En un pago con tarjeta ha llegado un tipo de operación que no es ni pago ni preautoritzación',
            'msg' => 'MSG0000',
            'detail' => ''
        ),

        'SIS0031' => array(
            'code' => 'SIS0031',
            'message' => 'Ds_Merchant_TransactionType Método de pago no definido',
            'msg' => 'MSG0000',
            'detail' => ''
        ),

        'SIS0034' => array(
            'code' => 'SIS0034',
            'message' => 'Error en acceso a la Base de datos',
            'msg' => 'MSG0000',
            'detail' => ''
        ),

        'SIS0038' => array(
            'code' => 'SIS0038',
            'message' => 'Error en JAVA',
            'msg' => 'MSG0000',
            'detail' => ''
        ),

        'SIS0040' => array(
            'code' => 'SIS0040',
            'message' => 'El comercio / Terminal no tiene ningún método de pago asignado',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0041' => array(
            'code' => 'SIS0041',
            'message' => 'Ds_Merchant_Signature Error en el cálculo del algoritmo HASH',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0042' => array(
            'code' => 'SIS0042',
            'message' => 'Ds_Merchant_Signature Error en el cálculo del algoritmo HASH',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0043' => array(
            'code' => 'SIS0043',
            'message' => 'Error al realizar la notificación on-line',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0046' => array(
            'code' => 'SIS0046',
            'message' => 'El Bin de la tarjeta no está dado de alta',
            'msg' => 'MSG0002',
            'detail' => ''
        ),

        'SIS0051' => array(
            'code' => 'SIS0051',
            'message' => 'Ds_Merchant_Order Número de pedido repetido',
            'msg' => 'MSG0001',
            'detail' => ''
        ),

        'SIS0054' => array(
            'code' => 'SIS0054',
            'message' => 'Ds_Merchant_Order No existe operación sobre la que realizar la devolución',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0055' => array(
            'code' => 'SIS0055',
            'message' => 'Ds_Merchant_Order La operación sobre la que se desea realizar la devolución no es una operación válida',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0056' => array(
            'code' => 'SIS0056',
            'message' => 'Ds_Merchant_Order La operación sobre la que se desea realizar la devolución no está autorizada',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0057' => array(
            'code' => 'SIS0057',
            'message' => 'Ds_Merchant_Amount El importe a devolver supera el permitido',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0058' => array(
            'code' => 'SIS0058',
            'message' => 'Inconsistencia de datos, en la validación de una confirmación',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0059' => array(
            'code' => 'SIS0059',
            'message' => 'Ds_Merchant_Order Error, no existe la operación sobre la que realizar la confirmación',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0060' => array(
            'code' => 'SIS0060',
            'message' => 'Ds_Merchant_Order Ya existe confirmación asociada a la preautorización',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0061' => array(
            'code' => 'SIS0061',
            'message' => 'Ds_Merchant_Order La preautorización sobre la que se desea confirmar no está autorizada',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0062' => array(
            'code' => 'SIS0062',
            'message' => 'Ds_Merchant_Amount El importe a confirmar supera el permitido',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0063' => array(
            'code' => 'SIS0063',
            'message' => 'Error en número de tarjeta',
            'msg' => 'MSG0008 ',
            'detail' => ''
        ),

        'SIS0064' => array(
            'code' => 'SIS0064',
            'message' => 'Error en número de tarjeta',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0065' => array(
            'code' => 'SIS0065',
            'message' => 'Error en número de tarjeta',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0066' => array(
            'code' => 'SIS0066',
            'message' => 'Error en caducidad tarjeta',
            'msg' => 'MSG0008 ',
            'detail' => ''
        ),

        'SIS0067' => array(
            'code' => 'SIS0067',
            'message' => 'Error en caducidad tarjeta',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0068' => array(
            'code' => 'SIS0068',
            'message' => 'Error en caducidad tarjeta',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0069' => array(
            'code' => 'SIS0069',
            'message' => 'Error en caducidad tarjeta',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0070' => array(
            'code' => 'SIS0070',
            'message' => 'Error en caducidad tarjeta',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0071' => array(
            'code' => 'SIS0071',
            'message' => 'Tarjeta caducada',
            'msg' => 'MSG0000',
            'detail' => ''
        ),

        'SIS0072' => array(
            'code' => 'SIS0072',
            'message' => 'Ds_Merchant_Order Operación no anulable',
            'msg' => 'MSG0000',
            'detail' => ''
        ),

        'SIS0074' => array(
            'code' => 'SIS0074',
            'message' => 'Ds_Merchant_Order Falta el campo',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0075' => array(
            'code' => 'SIS0075',
            'message' => 'Ds_Merchant_Order El valor tiene menos de 4 posiciones o más de 12',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0076' => array(
            'code' => 'SIS0076',
            'message' => 'Ds_Merchant_Order El valor no es numérico',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0078' => array(
            'code' => 'SIS0078',
            'message' => 'Ds_TransactionType Valor desconocido',
            'msg' => 'MSG0005',
            'detail' => ''
        ),

        'SIS0093' => array(
            'code' => 'SIS0093',
            'message' => 'Tarjeta no encontrada en tabla de rangos',
            'msg' => 'MSG0006',
            'detail' => ''
        ),

        'SIS0094' => array(
            'code' => 'SIS0094',
            'message' => 'La tarjeta no fue autenticada como 3D Secure',
            'msg' => 'MSG0004',
            'detail' => ''
        ),

        'SIS0112' => array(
            'code' => 'SIS0112',
            'message' => 'Ds_TransactionType Valor no permitido',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0114' => array(
            'code' => 'SIS0114',
            'message' => 'Se ha llamado con un GET en lugar de un POST',
            'msg' => 'MSG0000',
            'detail' => ''
        ),

        'SIS0115' => array(
            'code' => 'SIS0115',
            'message' => 'Ds_Merchant_Order No existe operación sobre la que realizar el pago de la cuota',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0116' => array(
            'code' => 'SIS0116',
            'message' => 'Ds_Merchant_Order La operación sobre la que se desea pagar una cuota no es válida.',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0117' => array(
            'code' => 'SIS0117',
            'message' => 'Ds_Merchant_Order La operación sobre la que se desea pagar una cuota no está autorizada',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0132' => array(
            'code' => 'SIS0132',
            'message' => 'La fecha de Confirmación de Autorización no puede superar en más de 7 días a la preautorización',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0133' => array(
            'code' => 'SIS0133',
            'message' => 'La fecha de confirmación de Autenticación no puede superar en más de 45 días la autenticación previa',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0139' => array(
            'code' => 'SIS0139',
            'message' => 'El pago recurrente inicial está duplicado',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0142' => array(
            'code' => 'SIS0142',
            'message' => 'Tiempo excedido para el pago',
            'msg' => 'MSG0000',
            'detail' => ''
        ),

        'SIS0198' => array(
            'code' => 'SIS0198',
            'message' => 'Importe supera límite permitido para el comercio',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0199' => array(
            'code' => 'SIS0199',
            'message' => 'El número de operaciones supera el límite permitido para el comercio',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0200' => array(
            'code' => 'SIS0200',
            'message' => 'El importe acumulado supera el límite permitido para el comercio',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0214' => array(
            'code' => 'SIS0214',
            'message' => 'El comercio no admite devoluciones',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0216' => array(
            'code' => 'SIS0216',
            'message' => 'El CVV2 tiene más de tres posiciones',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0217' => array(
            'code' => 'SIS0217',
            'message' => 'Error de formato en CVV2',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0218' => array(
            'code' => 'SIS0218',
            'message' => 'La entrada “Operaciones” no permite pagos seguros',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0219' => array(
            'code' => 'SIS0219',
            'message' => 'El número de operaciones de la tarjeta supera el límite permitido para el comercio',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0220' => array(
            'code' => 'SIS0220',
            'message' => 'El importe acumulado de la tarjeta supera el límite permitido para el comercio',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0221' => array(
            'code' => 'SIS0221',
            'message' => 'Error. El CVV2 es obligatorio',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0222' => array(
            'code' => 'SIS0222',
            'message' => 'Ya existe anulación asociada a la preautorización',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0223' => array(
            'code' => 'SIS0223',
            'message' => 'La preautorización que se desea anular no está autorizada',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0224' => array(
            'code' => 'SIS0224',
            'message' => 'El comercio no permite anulaciones por no tener firma ampliada',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0225' => array(
            'code' => 'SIS0225',
            'message' => 'No existe operación sobre la que realizar la anulación',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0226' => array(
            'code' => 'SIS0226',
            'message' => 'Inconsistencia de datos en la validación de una anulación',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0227' => array(
            'code' => 'SIS0227',
            'message' => 'Ds_Merchant_TransactionDate Valor no válido',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0229' => array(
            'code' => 'SIS0229',
            'message' => 'No existe el código de pago aplazado solicitado',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0252' => array(
            'code' => 'SIS0252',
            'message' => 'El comercio no permite el envío de tarjeta',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0253' => array(
            'code' => 'SIS0253',
            'message' => 'La tarjeta no cumple el check-digit',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0254' => array(
            'code' => 'SIS0254',
            'message' => 'El número de operaciones por IP supera el máximo permitido para el comercio',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0255' => array(
            'code' => 'SIS0255',
            'message' => 'El importe acumulado por IP supera el límite permitido para el comercio',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0256' => array(
            'code' => 'SIS0256',
            'message' => 'El comercio no puede realizar preautorizaciones',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0257' => array(
            'code' => 'SIS0257',
            'message' => 'La tarjeta no permite preautorizaciones',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0258' => array(
            'code' => 'SIS0258',
            'message' => 'Inconsistencia en datos de confirmación',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0261' => array(
            'code' => 'SIS0261',
            'message' => 'Operación supera alguna limitación de operatoria definida por Banco Sabadell',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0270' => array(
            'code' => 'SIS0270',
            'message' => 'Ds_Merchant_TransactionType Tipo de operación no activado para este comercio',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0274' => array(
            'code' => 'SIS0274',
            'message' => 'Ds_Merchant_TransactionType Tipo de operación desconocida o no permitida para esta entrada al TPV Virtual.',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0281' => array(
            'code' => 'SIS0281',
            'message' => 'Operación supera alguna limitación de operatoria definida por Banco Sabadell.',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0296' => array(
            'code' => 'SIS0296',
            'message' => 'Error al validar los datos de la operación “Tarjeta en Archivo (P.Suscripciones/P.Exprés)” inicial.',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0297' => array(
            'code' => 'SIS0297',
            'message' => 'Superado el número máximo de operaciones (99 oper. o 1 año) para realizar transacciones sucesivas de “Tarjeta en Archivo (P.Suscripciones/P.Exprés)”. Se requiere realizar una nueva operación de “Tarjeta en Archivo Inicial” para iniciar el ciclo..',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        'SIS0298' => array(
            'code' => 'SIS0298',
            'message' => 'El comercio no está configurado para realizar “Tarjeta en Archivo (P.Suscripciones/P.Exprés)”',
            'msg' => 'MSG0008',
            'detail' => ''
        ),

        // -- Generic messages -----------------------------------------------------------------------------------------
        'MSG0000' => array(
            'code' => 'MSG0000',
            'message' => 'El sistema está ocupado, inténtelo más tarde',
            'detail' => ''
        ),

        'MSG0001' => array(
            'code' => 'MSG0001',
            'message' => 'Número de pedido repetido',
            'detail' => ''
        ),

        'MSG0002' => array(
            'code' => 'MSG0002',
            'message' => 'El Bin de la tarjeta no está dado de alta en FINANET',
            'detail' => ''
        ),

        'MSG0003' => array(
            'code' => 'MSG0003',
            'message' => 'El sistema está arrancando, inténtelo en unos momentos',
            'detail' => ''
        ),

        'MSG0004' => array(
            'code' => 'MSG0004',
            'message' => 'Error de Autenticación',
            'detail' => ''
        ),

        'MSG0005' => array(
            'code' => 'MSG0005',
            'message' => 'No existe método de pago válido para su tarjeta',
            'detail' => ''
        ),

        'MSG0006' => array(
            'code' => 'MSG0006',
            'message' => 'Tarjeta ajena al servicio',
            'detail' => ''
        ),

        'MSG0007' => array(
            'code' => 'MSG0007',
            'message' => 'Faltan datos, por favor compruebe que su navegador acepta cookies',
            'detail' => ''
        ),

        'MSG0008' => array(
            'code' => 'MSG0008',
            'message' => 'Error en datos enviados. Contacte con su comercio.',
            'detail' => ''
        ),

        // -- Common response messages ---------------------------------------------------------------------------------

        '0000' => array(
            'code' => '0000',
            'message' => 'TRANSACCION APROBADA',
            'detail' => 'Transacción autorizada por el banco emisor de la tarjeta'
        ),
        '0001' => array(
            'code' => '0001',
            'message' => 'TRANSACCION APROBADA PREVIA IDENTIFICACION DE TITULAR',
            'detail' => 'Código exclusivo para transacciones Verified by Visa o MasterCard SecureCode. La transacción ha sido autorizada y, además, el banco emisor nos informa que ha autenticado correctamente la identidad del titular de la tarjeta.'
        ),
        '0002-0099' => array(
            'code' => '0002-0099',
            'message' => 'TRANSACCION APROBADA',
            'detail' => 'Transacción autorizada por el banco emisor.'
        ),
        '0101' => array(
            'code' => '0101',
            'message' => 'TARJETA CADUCADA',
            'detail' => 'Transacción denegada porque la fecha de caducidad de la tarjeta que se ha informado en el pago, es anterior a la actualmente vigente.'
        ),
        '0102' => array(
            'code' => '0102',
            'message' => 'TARJETA BLOQUEDA TRANSITORIAMENTE O BAJO SOSPECHA DE FRAUDE',
            'detail' => 'Tarjeta bloqueada transitoriamente por el banco emisor o bajo sospecha de fraude.'
        ),
        '0104' => array(
            'code' => '0104',
            'message' => 'OPERACIÓN NO PERMITIDA',
            'detail' => 'Operación no permitida para ese tipo de tarjeta.'
        ),
        '0106' => array(
            'code' => '0106',
            'message' => 'NUM. INTENTOS EXCEDIDO',
            'detail' => 'Excedido el número de intentos con PIN erróneo.'
        ),
        '0107' => array(
            'code' => '0107',
            'message' => 'CONTACTAR CON EL EMISOR',
            'detail' => 'El banco emisor no permite una autorización automática. Es necesario contactar telefónicamente con su centro autorizador para obtener una aprobación manual.'
        ),
        '0109' => array(
            'code' => '0109',
            'message' => 'IDENTIFICACIÓN INVALIDA DEL COMERCIO O TERMINAL',
            'detail' => 'Denegada porque el comercio no está correctamente dado de alta en los sistemas internacionales de tarjetas.'
        ),
        '0110' => array(
            'code' => '0110',
            'message' => 'IMPORTE INVALIDO',
            'detail' => 'El importe de la transacción es inusual para el tipo de comercio que solicita la autorización de pago.'
        ),
        '0114' => array(
            'code' => '0114',
            'message' => 'TARJETA NO SOPORTA EL TIPO DE OPERACIÓN SOLICITADO',
            'detail' => 'Operación no permitida para ese tipo de tarjeta.'
        ),
        '0116' => array(
            'code' => '0116',
            'message' => 'DISPONIBLE INSUFICIENTE',
            'detail' => 'El titular de la tarjeta no dispone de suficiente crédito para atender el pago.'
        ),
        '0118' => array(
            'code' => '0118',
            'message' => 'TARJETA NO REGISTRADA',
            'detail' => 'Tarjeta inexistente o no dada de alta por banco emisor.'
        ),
        '0125' => array(
            'code' => '0125',
            'message' => 'TARJETA NO EFECTIVA',
            'detail' => 'Tarjeta inexistente o no dada de alta por banco emisor.'
        ),
        '0129' => array(
            'code' => '0129',
            'message' => 'ERROR CVV2/CVC2',
            'detail' => 'El código CVV2/CVC2 (los tres dígitos del reverso de la tarjeta) informado por el comprador es erróneo.'
        ),
        '0167' => array(
            'code' => '0167',
            'message' => 'CONTACTAR CON EL EMISOR: SOSPECHA DE FRAUDE',
            'detail' => 'Debido a una sospecha de que la transacción es fraudulenta el banco emisor no permite una autorización automática. Es necesario contactar telefónicamente con su centro autorizador para obtener una aprobación manual.'
        ),
        '0180' => array(
            'code' => '0180',
            'message' => 'TARJETA AJENA AL SERVICIO',
            'detail' => 'Operación no permitida para ese tipo de tarjeta.'
        ),
        '0181-182' => array(
            'code' => '0181-0182',
            'message' => 'TARJETA CON RESTRICCIONES DE DEBITO O CREDITO',
            'detail' => 'Tarjeta bloqueada transitoriamente por el banco emisor.'
        ),
        '0184' => array(
            'code' => '0184',
            'message' => 'ERROR EN AUTENTICACION',
            'detail' => 'Código exclusivo para transacciones Verified by Visa o MasterCard SecureCode. La transacción ha sido denegada porque el banco emisor no pudo autenticar debidamente al titular de la tarjeta.'
        ),
        '0190' => array(
            'code' => '0190',
            'message' => 'DENEGACION SIN ESPECIFICAR EL MOTIVO',
            'detail' => 'Transacción denegada por el banco emisor pero sin que este dé detalles acerca del motivo.'
        ),
        '0191' => array(
            'code' => '0191',
            'message' => 'FECHA DE CADUCIDAD ERRONEA',
            'detail' => 'Transacción denegada porque la fecha de caducidad de la tarjeta que se ha informado en el pago, no se corresponde con la actualmente vigente.'
        ),
        '0201' => array(
            'code' => '0201',
            'message' => 'TARJETA CADUCADA',
            'detail' => 'Transacción denegada porque la fecha de caducidad de la tarjeta que se ha informado en el pago, es anterior a la actualmente vigente. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
        ),
        '0202' => array(
            'code' => '0202',
            'message' => 'TARJETA BLOQUEDA TRANSITORIAMENTE O BAJO SOSPECHA DE FRAUDE',
            'detail' => 'Tarjeta bloqueada transitoriamente por el banco emisor o bajo sospecha de fraude. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
        ),
        '0204' => array(
            'code' => '0204',
            'message' => 'OPERACION NO PERMITIDA',
            'detail' => 'Operación no permitida para ese tipo de tarjeta. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
        ),
        '0207' => array(
            'code' => '0207',
            'message' => 'CONTACTAR CON EL EMISOR',
            'detail' => 'El banco emisor no permite una autorización automática. Es necesario contactar telefónicamente con su centro autorizador para obtener una aprobación manual. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
        ),
        '0208-0209' => array(
            'code' => '0208-0209',
            'message' => 'TARJETA PERDIDA O ROBADA',
            'detail' => 'Tarjeta bloqueada por el banco emisor debido a que el titular le ha manifestado que le ha sido robada o perdida. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
        ),
        '0280' => array(
            'code' => '0280',
            'message' => 'ERROR CVV2/CVC2',
            'detail' => 'Código exclusivo para transacciones en las que se solicita el código de 3 dígitos CVV2 (tarj.Visa) o CVC2 (tarj.MasterCard) del reverso de la tarjeta. El código CVV2/CVC2 informado por el comprador es erróneo. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
        ),
        '0290' => array(
            'code' => '0290',
            'message' => 'DENEGACION SIN ESPECIFICAR EL MOTIVO',
            'detail' => 'Transacción denegada por el banco emisor pero sin que este dé detalles acerca del motivo. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
        ),
        '0400' => array(
            'code' => '0400',
            'message' => 'ANULACION ACEPTADA',
            'detail' => 'Transacción de anulación o retrocesión parcial aceptada por el banco emisor.'
        ),
        '0480' => array(
            'code' => '0480',
            'message' => 'NO SE ENCUENTRA LA OPERACIÓN ORIGINAL O TIME-OUT EXCEDIDO',
            'detail' => 'La anulación o retrocesión parcial no ha sido aceptada porque no se ha localizado la operación original, o bien, porque el banco emisor no ha dado respuesta dentro del time-out predefinido.'
        ),
        '0481' => array(
            'code' => '0481',
            'message' => 'ANULACION ACEPTADA',
            'detail' => 'Transacción de anulación o retrocesión parcial aceptada por el banco emisor. No obstante, la respuesta del banco emisor se ha recibido con mucha demora, fuera del time-out predefinido.'
        ),
        '0500' => array(
            'code' => '0500',
            'message' => 'CONCILIACION ACEPTADA',
            'detail' => 'La transacción de conciliación ha sido aceptada por el banco emisor.'
        ),
        '0501-503' => array(
            'code' => '0501-0503',
            'message' => 'NO ENCONTRADA LA OPERACION ORIGINAL O TIME-OUT EXCEDIDO',
            'detail' => 'La conciliación no ha sido aceptada porque no se ha localizado la operación original, o bien, porque el banco emisor no ha dado respuesta dentro del time-out predefinido.'
        ),
        '9928' => array(
            'code' => '9928',
            'message' => 'ANULACIÓN DE PREAUTORITZACIÓN REALIZADA POR EL SISTEMA',
            'detail' => 'El sistema ha anulado la preautorización diferida al haber pasado más de 72 horas.'
        ),
        '9929' => array(
            'code' => '9929',
            'message' => 'ANULACIÓN DE PREAUTORITZACIÓN REALIZADA POR EL COMERCIO',
            'detail' => 'La anulación de la preautorización ha sido aceptada'
        ),

        // -- Sabadell response messages -------------------------------------------------------------------------------

        '0904' => array(
            'code' => '0904',
            'message' => 'COMERCIO NO REGISTRADO EN EL FUC',
            'detail' => 'Hay un problema en la configuración del código de comercio. Contactar con Banco Sabadell para solucionarlo.'
        ),
        '0909' => array(
            'code' => '0909',
            'message' => 'ERROR DE SISTEMA',
            'detail' => 'Error en la estabilidad de la plataforma de pagos de Banco Sabadell o en la de los sistemas de intercambio de Visa o MasterCard.'
        ),
        '0912' => array(
            'code' => '0912',
            'message' => 'EMISOR NO DISPONIBLE',
            'detail' => 'El centro autorizador del banco emisor no está operativo en estos momentos.'
        ),
        '0913' => array(
            'code' => '0913',
            'message' => 'TRANSMISION DUPLICADA',
            'detail' => 'Se ha procesado recientemente una transacción con el mismo número de pedido (Ds_Merchant_Order).'
        ),
        '0916' => array(
            'code' => '0916',
            'message' => 'IMPORTE DEMASIADO PEQUEÑO',
            'detail' => 'No es posible operar con este importe.'
        ),
        '0928' => array(
            'code' => '0928',
            'message' => 'TIME-OUT EXCEDIDO',
            'detail' => 'El banco emisor no da respuesta a la petición de autorización dentro del time-out predefinido.'
        ),
        '0940' => array(
            'code' => '0940',
            'message' => 'TRANSACCION ANULADA ANTERIORMENTE',
            'detail' => 'Se está solicitando una anulación o retrocesión parcial de una transacción que con anterioridad ya fue anulada.'
        ),
        '0941' => array(
            'code' => '0941',
            'message' => 'TRANSACCION DE AUTORIZACION YA ANULADA POR UNA ANULACION ANTERIOR',
            'detail' => 'Se está solicitando la confirmación de una transacción con un número de pedido (Ds_Merchant_Order) que se corresponde a una operación anulada anteriormente.'
        ),
        '0942' => array(
            'code' => '0942',
            'message' => 'TRANSACCION DE AUTORIZACION ORIGINAL DENEGADA',
            'detail' => 'Se está solicitando la confirmación de una transacción con un número de pedido (Ds_Merchant_Order) que se corresponde a una operación denegada.'
        ),
        '0943' => array(
            'code' => '0943',
            'message' => 'DATOS DE LA TRANSACCION ORIGINAL DISTINTOS',
            'detail' => 'Se está solicitando una confirmación errónea.'
        ),
        '0944' => array(
            'code' => '0944',
            'message' => 'SESION ERRONEA',
            'detail' => 'Se está solicitando la apertura de una tercera sesión. En el proceso de pago solo está permitido tener abiertas dos sesiones (la actual y la anterior pendiente de cierre).'
        ),
        '0945' => array(
            'code' => '0945',
            'message' => 'TRANSMISION DUPLICADA',
            'detail' => 'Se ha procesado recientemente una transacción con el mismo número de pedido (Ds_Merchant_Order).'
        ),
        '0946' => array(
            'code' => '0946',
            'message' => 'OPERACION A ANULAR EN PROCESO',
            'detail' => 'Se ha solicitada la anulación o retrocesión parcial de una transacción original que todavía está en proceso y pendiente de respuesta.'
        ),
        '0947' => array(
            'code' => '0947',
            'message' => 'TRANSMISION DUPLICADA EN PROCESO',
            'detail' => 'Se está intentando procesar una transacción con el mismo número de pedido (Ds_Merchant_Order) de otra que todavía está pendiente de respuesta.'
        ),
        '0949' => array(
            'code' => '0949',
            'message' => 'TERMINAL INOPERATIVO',
            'detail' => 'El número de comercio (Ds_Merchant_MerchantCode) o el de terminal (Ds_Merchant_Terminal) no están dados de alta o no son operativos.'
        ),
        '0950' => array(
            'code' => '0950',
            'message' => 'DEVOLUCION NO PERMITIDA',
            'detail' => 'La devolución no está permitida por regulación.'
        ),
        '0965' => array(
            'code' => '0965',
            'message' => 'VIOLACIÓN NORMATIVA',
            'detail' => 'Violación de la Normativa de Visa o Mastercard'
        ),
        '9064' => array(
            'code' => '9064',
            'message' => 'LONGITUD TARJETA INCORRECTA',
            'detail' => 'Nº posiciones de la tarjeta incorrecta'
        ),
        '9078' => array(
            'code' => '9078',
            'message' => 'NO EXISTE METODO DE PAGO',
            'detail' => 'Los tipos de pago definidos para el terminal (Ds_Merchant_Terminal) por el que se procesa la transacción, no permiten pagar con el tipo de tarjeta informado.'
        ),
        '9093' => array(
            'code' => '9093',
            'message' => 'TARJETA NO EXISTE',
            'detail' => 'Tarjeta inexistente.'
        ),
        '9094' => array(
            'code' => '9094',
            'message' => 'DENEGACION DE LOS EMISORES',
            'detail' => 'Operación denegada por parte de los emisoras internacionales'
        ),
        '9104' => array(
            'code' => '9104',
            'message' => 'OPER. SEGURA NO ES POSIBLE',
            'detail' => 'Comercio con autenticación obligatoria y titular sin clave de compra segura'
        ),
        '9142' => array(
            'code' => '9142',
            'message' => 'TIEMPO LÍMITE DE PAGO SUPERADO',
            'detail' => 'El titular de la tarjeta no se ha autenticado durante el tiempo máximo permitido.'
        ),
        '9218' => array(
            'code' => '9218',
            'message' => 'NO SE PUEDEN HACER OPERACIONES SEGURAS',
            'detail' => 'La entrada Operaciones no permite operaciones Seguras'
        ),
        '9253' => array(
            'code' => '9253',
            'message' => 'CHECK-DIGIT ERRONEO',
            'detail' => 'Tarjeta no cumple con el check-digit (posición 16 del número de tarjeta calculada según algoritmo de Luhn).'
        ),
        '9256' => array(
            'code' => '9256',
            'message' => 'PREAUTORITZACIONES NO HABILITADAS',
            'detail' => 'La tarjeta no puede hacer Preautorizaciones'
        ),
        '9261' => array(
            'code' => '9261',
            'message' => 'LÍMITE OPERATIVO EXCEDIDO',
            'detail' => 'La transacción excede el límite operativo establecido por Banco Sabadell'
        ),
        '9283' => array(
            'code' => '9283',
            'message' => 'SUPERA ALERTAS BLOQUANTES',
            'detail' => 'La operación excede las alertas bloqueantes, no se puede procesar'
        ),
        '9281' => array(
            'code' => '9281',
            'message' => 'SUPERA ALERTAS BLOQUEANTES',
            'detail' => 'La operación excede las alertas bloqueantes, no se puede procesar'
        ),
        '9912' => array(
            'code' => '9912',
            'message' => 'EMISOR NO DISPONIBLE',
            'detail' => 'El centro autorizador del banco emisor no está operativo en estos momentos.'
        ),
        '9913' => array(
            'code' => '9913',
            'message' => 'ERROR EN CONFIRMACION',
            'detail' => 'Error en la confirmación que el comercio envía al TPV Virtual (solo aplicable en la opción de sincronización SOAP)'
        ),
        '9914' => array(
            'code' => '9914',
            'message' => 'CONFIRMACION “KO”',
            'detail' => 'Confirmación “KO” del comercio (solo aplicable en la opción de sincronización SOAP)'
        ),
        '9915' => array(
            'code' => '9915',
            'message' => 'PAGO CANCELADO',
            'detail' => 'El usuario ha cancelado el pago'
        ),
        '9928' => array(
            'code' => '9928',
            'message' => 'AUTORIZACIÓN EN DIFERIDO ANULADA',
            'detail' => 'Anulación de autorización en diferido realizada por el SIS (proceso batch)'
        ),
        '9929' => array(
            'code' => '9929',
            'message' => 'AUTORIZACIÓN EN DIFERIDO ANULADA',
            'detail' => 'Anulación de autorización en diferido realizada por el comercio'
        ),
        '9997' => array(
            'code' => '9997',
            'message' => 'TRANSACCIÓN SIMULTÁNEA',
            'detail' => 'En el TPV Virtual se está procesando de forma simultánea otra operación con la misma tarjeta.'
        ),
        '9998' => array(
            'code' => '9998',
            'message' => 'ESTADO OPERACIÓN: SOLICITADA',
            'detail' => 'Estado temporal mientras la operación se procesa. Cuando la operación termine este código cambiará.'
        ),
        '9999' => array(
            'code' => '9999',
            'message' => 'ESTADO OPERACIÓN: AUTENTICANDO',
            'detail' => 'Estado temporal mientras el TPV realiza la autenticación del titular. Una vez finalizado este proceso el TPV asignará un nuevo código a la operación.'
        )
    ];


    /**
     * @param  string $code
     * @return string
     */
    public static function getByCode($code)
    {
        if (array_key_exists($code, self::$messages)) {
            return self::$messages[$code];
        }

        return null;
    }
}