******* English *******

PayGol module for WHMCS, version 4.1  

About this module:
- This module allows you to easily integrate PayGol on your platform. PayGol is an online payment gateway that offers a 
  wide array of both worldwide and local payment methods such as credit and debit card, paysafecard, bank transfers, cash payments, 
  SMS/call and more. More payment options and wider coverage means that paying for your products and services is easier than ever 
  for your customers, and at the same time it means higher revenue for you.

Requirements:
- Working WHMCS installation (tested up to version 7.1.1).
- PayGol account.
- Standard type PayGol service.

Installation:
- Unzip the paygol_whmcs_4.0.zip file directly in the modules/gateways folder of your WHMCS installation.
- Activate the PayGol module in your WHMCS admin panel (Setup -> Payment -> Payment Gateways -> All Payment Gateways).
- Once it's activated, proceed to the module's setup page (Setup -> Payment -> Payment Gateways -> Manage Existing Gateways).
- Enter the ID of your PayGol service (can be found at the My Services section of your panel, at PayGol's website).
- Enter the "Secret Key" of your PayGol service (can be found at the My Services section of your panel, at PayGol's website).
- Paste the provided URL into the Background URL (IPN) field at your service's configuration, 
  which you can access through the My Services section of your panel, at PayGol's website:

Testing:
- To test the newly installed module you can enable your service's test mode at the My Services section of your panel, at PayGol's website. 
  Be sure to change it back before going live.

Important notes:
- While in test mode, an IPN request (payment notification to your platform) will be issued immediately after each test.
- After a payment is completed it will remain at pending state until you activate it at your WHMCS panel, 
  this is a safety measure to prevent abuse.
- Payments are usually notified immediately; however, certain payment methods may take longer to confirm the payment 
  (e.g. methods that take a few minutes to notify the transaction, or voucher-based transactions that require the payer to print 
  it in order to pay by cash at a given place). In these cases the product is shown as not paid, and only once it's confirmed by the 
  provider will it show as paid. We strongly recommend that you inform your customers about this beforehand in order to avoid confusions.



******* Espa�ol *******

M�dulo de PayGol para WHMCS, versi�n 4.1

Acerca de este m�dulo:
- Este m�dulo permite integrar PayGol f�cilmente en tu sistema. PayGol es un sistema de pagos en l�nea que ofrece una amplia variedad 
  de m�todos de pago tanto internacionales como locales tales como tarjeta de cr�dito y d�bito, paysafecard, transferencia bancaria, 
  pagos en efectivo, SMS/llamada y m�s. M�s opciones de pago y mayor cobertura significan que para tus clientes es m�s f�cil que nunca pagar 
  por tus productos y servicios, a la vez que tambi�n significan mayores ventas y ganancias para t�.

Requerimientos:
- Instalaci�n funcional de WHMCS (probado hasta la versi�n 7.1.1).
- Cuenta en PayGol.
- Servicio tipo Est�ndar.

Instalaci�n:
- Descomprime el archivo paygol_whmcs_4.0.zip directamente en la carpeta modules/gateways de tu instalaci�n de WHMCS.
- Activa el m�dulo de PayGol en tu panel de administraci�n de WHMCS (Setup -> Payment -> Payment Gateways -> All Payment Gateways).
- Una vez activado, procede a la p�gina de configuraci�n del m�dulo (Setup -> Payment -> Payment Gateways -> Manage Existing Gateways).
- Ingresa el ID de tu servicio de PayGol (puede ser encontrado en la secci�n Mis Servicios de tu panel, en el sitio web de PayGol).
- Ingresa Secret key de tu servicio de PayGol (puede ser encontrado en la secci�n Mis Servicios de tu panel, en el sitio web de PayGol).
- Copia la URL proporcionada y p�gala en el campo URL de proceso (IPN) de la configuraci�n de tu servicio, accesible a trav�s 
  de la secci�n Mis Servicios de tu panel, en el sitio web de PayGol.

Pruebas:
- Para probar el m�dulo tras su instalaci�n puedes activar el modo de pruebas de tu servicio en la secci�n Mis Servicios de tu panel, 
  en el sitio web de PayGol. Recuerda cambiarlo de vuelta una vez conclu�das tus pruebas.

Notas importantes:
- En modo de pruebas se realizar� un llamado IPN (notificaci�n de pago a tu plataforma) inmediatamente despu�s de cada prueba.
- Una vez un pago sea completado, el mismo se mostrar� como pendiente hasta que lo actives en tu panel de WHMCS, 
  esto es una medida de seguridad para evitar abusos.
- Los pagos usualmente son notificados inmediatamente; ahora bien, algunos m�todos de pago podr�an tomar m�s tiempo en notificar 
  la transacci�n (ej: m�todos que toman algunos minutos en realizar la notificaci�n, o m�todos basados en boletos que deben ser 
  impresos y pagados en efectivo). En esos casos el producto se mostrar� como no pagado, y s�lo una vez sea confirmado por el 
  proveedor se mostrar� como pagado. Recomendamos que informes a tu clientela sobre esto a modo de evitar confusiones.