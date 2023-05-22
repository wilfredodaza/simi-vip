<?php

namespace App\Database\Seeds;

use App\Models\Menu;
use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menu = new Menu();
        $menu->save(['option' => 'Facturador', 'url' => 'invoice', 'icon' => 'add', 'position' => 1, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Productos', 'url' => 'products', 'icon' => 'inbox', 'position' => 6, 'type' => 'secundario', 'references' => 21, 'status' => 'active', 'component' => 'table', 'title' => 'Productos', 'description' => '<p>Listado de productos.</p>', 'table' => 'products', 'to_list' => 'No']);
        $menu->save(['option' => 'Clientes', 'url' => 'customers', 'icon' => 'people', 'position' => 1, 'type' => 'secundario', 'references' => 21, 'status' => 'active', 'component' => 'table', 'title' => 'Clientes', 'description' => '<p>Listado de Clientes</p>', 'table' => 'customers', 'to_list' => 'No']);
        $menu->save(['option' => 'Paso A Paso', 'url' => null, 'icon' => 'layers', 'position' => 1, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'table', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'compañias', 'url' => 'companies', 'icon' => null, 'position' => 1, 'type' => 'secundario', 'references' => 4, 'status' => 'active', 'component' => 'table', 'title' => 'Compañias', 'description' => '<p>Listado de compa&ntilde;ias</p>', 'table' => 'companies', 'to_list' => 'No']);
        $menu->save(['option' => 'software', 'url' => 'software', 'icon' => 'computer', 'position' => 2, 'type' => 'secundario', 'references' => 4, 'status' => 'active', 'component' => 'table', 'title' => 'Software', 'description' => '<p>Listado de Software</p>', 'table' => 'software', 'to_list' => 'No']);
        $menu->save(['option' => 'resoluciones', 'url' => 'resolutions', 'icon' => 'content_paste', 'position' => 3, 'type' => 'secundario', 'references' => 4, 'status' => 'active', 'component' => 'table', 'title' => 'Resoluciones', 'description' => '<p>Listado de resoluciones.</p>', 'table' => 'resolutions', 'to_list' => 'No']);
        $menu->save(['option' => 'certificado', 'url' => 'certificates', 'icon' => null, 'position' => 4, 'type' => 'secundario', 'references' => 4, 'status' => 'active', 'component' => 'table', 'title' => 'Certificados', 'description' => '<p>Listado de certificados</p>', 'table' => 'certificates', 'to_list' => 'No']);
        $menu->save(['option' => 'Usuarios', 'url' => 'users', 'position' => 9, 'type' => 'secundario', 'references' => 21, 'status' => 'active', 'component' => 'table', 'title' => 'Usuarios', 'description' => '<p>Listado de usuarios</p>', 'table' => 'users', 'to_list' => 'No']);
        $menu->save(['option' => 'Personalizar documentos', 'url' => 'config', 'icon' => 'settings', 'position' => 5, 'type' => 'secundario', 'references' => 21, 'status' => 'active', 'component' => 'table', 'title' => 'Configuración de factura en pdf', 'description' => '<p>Configure su factura</p>', 'table' => 'config', 'to_list' => 'No']);
        $menu->save(['option' => 'Paquetes', 'url' => 'packages', 'icon' => 'apps', 'position' => 2, 'type' => 'secundario', 'references' => 22, 'status' => 'active', 'component' => 'table', 'title' => 'packages', 'description' => '<p>Listado de paquetes.</p>', 'table' => 'packages', 'to_list' => 'No']);
        $menu->save(['option' => 'Suscripciones', 'url' => 'subscriptions', 'icon' => 'storage', 'position' => 6, 'type' => 'secundario', 'references' => 22, 'status' => 'active', 'component' => 'table', 'title' => 'Subcripciones', 'description' => '<p>Listado suscripciones.</p>', 'table' => 'subscriptions', 'to_list' => 'No']);
        $menu->save(['option' => 'Cuentas  Contables', 'url' => 'accounting_account', 'icon' => 'people', 'position' => 3, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'table', 'title' => null, 'description' => '<p>Ingresa&nbsp;o registra&nbsp;tus cuentas contables;&nbsp;Si necesitas cargar un listado, cont&aacute;ctanos, nosotros te ayudamos.</p>', 'table' => 'accounting_account', 'to_list' => 'No']);
        $menu->save(['option' => 'Tipo de Cuentas', 'url' => 'type_accounting_account', 'icon' => 'add', 'position' => 8, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'table', 'title' => 'Tipos de cuentas contables', 'description' => '<p>Listado de tipos de cuentas contables</p>', 'table' => 'type_accounting_account', 'to_list' => 'No']);
        $menu->save(['option' => 'Cartera OnLine', 'url' => 'wallet', 'icon' => 'account_balance_wall', 'position' => 4, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => 'Cartera', 'description' => '<p>Listado de pagos realizados.</p>', 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Reportes', 'url' => 'report', 'icon' => 'assignment', 'position' => 6, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => 'Reportes', 'description' => '<p>Crea tus reportes</p>', 'table' => 'report', 'to_list' => 'No']);
        $menu->save(['option' => 'Personalizar email', 'url' => 'customize_mail', 'email' => 'settings', 'position' => 3, 'type' => 'secundario', 'references' => 22, 'status' => 'active', 'component' => 'table', 'title' => 'Personalización de correos', 'description' => '<p>Listado de emails.</p>', 'table' => 'customize_mail', 'to_list' => 'No']);
        $menu->save(['option' => 'Solicitudes', 'url' => 'solicitudes', 'icon' => 'notifications_active', 'position' => 4, 'type' => 'secundario', 'references' => 22, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => '<p>Listado de emails.</p>', 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Ayudas', 'url' => 'tooltips', 'icon' => 'help', 'position' => 1, 'type' => 'secundario', 'references' => 22, 'status' => 'active', 'component' => 'table', 'title' => 'Ayudas', 'description' => null, 'table' => 'config', 'tooltips' => 'No']);
        $menu->save(['option' => 'Configuración', 'url' => null, 'icon' => 'settings', 'position' => 20, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'table', 'title' => 'Configuración', 'description' => '<p>Listado de pagos realizados.</p>', 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Vendedores', 'url' => 'sellers', 'icon' => 'supervisor_account', 'position' => 7, 'type' => 'secundario', 'references' => 22, 'status' => 'active', 'component' => 'table', 'title' => 'Vendedores', 'description' => '<p>En este apartado podra crear vendedores y darles una direccion de url para realizar la ventas.</p><br/><p>ejemplo =https://planeta internet.com/mifacturalegal/public/solicitudes/registro?v= Numero de cedula vendedor<p/>', 'table' => 'sellers', 'to_list' => 'No']);
        $menu->save(['option' => 'Registro', 'url' => null, 'icon' => 'receipt_long', 'position' => 6, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'table', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Cotizaciones', 'url' => 'quotation', 'icon' => 'receipt_long', 'position' => 5, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => '<p>Listado de pagos realizados.</p>', 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Importar Archivos', 'url' => 'import', 'icon' => 'file_upload', 'position' => 4, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => '<p>Ingresa&nbsp;o registra&nbsp;tus cuentas contables;&nbsp;Si necesitas cargar un listado, cont&aacute;ctanos, nosotros te ayudamos.</p>', 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Vendedor', 'url' => 'seller', 'icon' => 'payment', 'position' => 10, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'table', 'title' => 'Vendedores', 'description' => '<p>Listado de vendedores</p>', 'table' => 'seller', 'to_list' => 'No']);
        $menu->save(['option' => 'Solicitudes Incompletas', 'url' => 'solicitudes/incompletas', 'icon' => 'people', 'position' => 5, 'type' => 'secundario', 'references' => 22, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => '<p>Listado de emails.</p>', 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Reporte General', 'url' => 'report_general', 'icon' => null, 'position' => 1, 'type' => 'secundario', 'references' => 16, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Reporte Detallado', 'url' => 'report_detail', 'icon' => null, 'position' => 2, 'type' => 'secundario', 'references' => 16, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description'=> null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Reporte de IVA', 'url' => 'report_taxes', 'icon' => null, 'position' => 3, 'type' => 'secundario', 'references' => 16, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Reporte Retenciones', 'url' =>  'report_retention', 'icon' => null, 'position' => 4, 'type' => 'secundario', 'references' => 16, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Reporte de Cartera', 'url' => 'report_wallet', 'icon' => null, 'position' => 16, 'type' => 'secundario', 'references' => 16,  'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Programas Contables', 'url' => 'report', 'icon' => null, 'position' => 6, 'type' => 'secundario', 'references' =>16, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Reporte Cotizaciones', 'url' => 'report_quotation', 'icon' => null, 'position' => 5, 'type' => 'secundario', 'references' =>16, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Recepción Documentos', 'url' => 'documents', 'icon' => 'cloud_upload', 'position' => 2, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => '<p>Listado de pagos realizados.</p>', 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Informes', 'url' => null, 'icon' => 'landscape', 'position' => 10, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'table', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Informe de Ventas', 'url' => 'graphic/sales_of_month', 'icon' => null, 'position' => 1, 'type' => 'secundario', 'references' => 35, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Informe de Productos', 'url' => 'graphic/sales_of_product', 'icon' => null, 'position' => 2, 'type' => 'secundario', 'references' => 35, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Informe de Clientes', 'url' => 'graphic/sales_of_customer', 'icon' => null, 'position' => 3, 'type' => 'secundario', 'references' => 35, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Informe de Vendedores', 'url' => 'graphic/sales_of_seller', 'icon' => null, 'position' => 4, 'type' => 'secundario', 'references' =>35, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Informe de Cartera', 'url' => 'graphic/sales_of_wallet', 'icon' => null, 'position' =>  5, 'type' => 'secundario', 'references' => 35, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Configurar Informes', 'url' => 'graphic', 'icon' => null, 'position' => 2, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => '<p>Listado de Clientes</p>', 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Documento Soporte', 'url' => 'document_support', 'icon' => 'assignment_ind', 'position' => 3, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Proveedores', 'url' => 'providers', 'icon' => null, 'position' => 7, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'table', 'title' => 'Proveedores', 'description' => '<p>Listado de proveedores</p>', 'table' => null, 'providers' => 'No']);
        $menu->save(['option' => 'Estado de Suscripción', 'url' => 'expired_subscription', 'icon' => null, 'position' => 3, 'type' => 'secundario', 'references' => 22, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Nomina Electrónica', 'url' => 'payrolls', 'icon' => 'assignment_ind', 'position' => 4, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Empleados', 'url' => 'workers', 'icon' => 'assignment_ind', 'position' => 2, 'type' => 'secundario', 'references' => 45, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Emitir', 'url' => 'periods', 'icon' => null, 'position' => 3, 'type' => 'secundario', 'references' => 45, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Conceptos', 'url' => 'other_concepts', 'icon' => null, 'position' => 1, 'type' => 'secundario', 'references' => 45, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Bancos', 'url' => 'other_banks', 'icon' => 'add', 'position' => 4, 'type' => 'secundario', 'references' => 45, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Cargue Nomina', 'url' => 'import/payroll', 'icon' => null, 'position' => 5, 'type' => 'secundario', 'references' => 45, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Cargue de Contable', 'url' => 'accounting_files', 'icon' => null, 'position' => 10, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'table', 'title' => 'Cargue Contable', 'description' => null, 'table' => 'accounting_files', 'to_list' => 'Si']);
        $menu->save(['option' => 'Reporte de Nómina', 'url' => 'report_payroll', 'icon' => null, 'position' => 10, 'type' => 'secundario', 'references' => 16, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Desprendibles', 'url' => 'payroll_removable', 'icon' => 'assignment_turned_in', 'position' => 3, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Desprendible de nomina', 'url' => 'payroll_removable', 'icon' => 'people', 'position' => 3, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Union Temporal', 'url' => 'partnerships', 'icon' => null, 'position' => 5, 'type' => 'secundario', 'references' => 4, 'status' => 'active', 'component' => 'table', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Disponibles', 'url' => 'inventory/availability', 'icon' => 'app', 'position' => 24, 'type' => 'secundario', 'references' =>  57, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Inventario', 'url' => null, 'icon' => 'line_weight', 'position' => 4, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => 'Inventario', 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Productos', 'url' => 'products', 'icon' => 'bubble_chart', 'position' => 2, 'type' => 'secundario', 'references' => 2, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Buscar producto', 'url' => 'search_product', 'icon' => 'search', 'position' =>  3, 'type' => 'secundario', 'references' => 57, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'No']);
        $menu->save(['option' => 'Reporte', 'url' => 'inventory/report', 'icon' => 'format_list_bulleted', 'position' => 5, 'type' => 'secundario', 'references' => 57, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Entradas y Salidas', 'url' => 'inventory', 'icon' => null, 'position' => 5, 'type' => 'secundario', 'references' => 57, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Compras', 'url' => 'demo', 'icon' => 'local_grocery_store', 'position' => 4, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Personalizar Certificado', 'url' => 'personalization_labor_certificates', 'icon' => null, 'position' => 12, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'table', 'title' => 'Personalizar Certificado', 'description' => null, 'table' => 'personalization_labor_certificates', 'to_list' => 'Si']);
        $menu->save(['option' => 'Nomina de Ajuste', 'url' => 'period_adjusts', 'icon' => null, 'position' => 3, 'type' => 'secundario', 'references' => 45, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Cambiar Contraseña', 'url' => 'password', 'icon' => null, 'position' => 20, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Certificado Laboral', 'url' => 'work_certificate', 'icon' => 'insert_drive_file', 'position' => 3, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Proveedores', 'url' => 'providers', 'icon' => 'people', 'position' => 5, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Contabilidad', 'url' => 'contabilidad', 'icon' => 'payment', 'position' => 6, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Tesorería', 'url' => 'finansiera', 'icon' => 'insert_drive_file', 'position' => 7, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Sistema Post', 'url' => '/post/create', 'icon' => 'receipt', 'position' => 8, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Conexion a Email', 'url' => 'connect_emails', 'icon' => null, 'position' => 13, 'type' => 'secundario', 'references' => 20, 'status' => 'active', 'component' => 'table', 'title' => 'Conexion a Email', 'description' => null, 'table' => 'connect_emails', 'to_list' => 'Si']);
        $menu->save(['option' => 'Integraciones', 'url' => 'integrations', 'icon' => 'add', 'position' => 4, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Retenciones y Ingresos', 'url' => 'income_withholding', 'icon' => 'assignment_ind', 'position' => 11, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Compra', 'url' => 'shopping', 'icon' => 'local_grocery_store', 'position' => 4, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Emitir', 'url' => 'document_support', 'icon' => 'add', 'position' => 1, 'type' => 'secundario', 'references' => 42, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Productos', 'url' => 'product_provider', 'icon' => null, 'position' => 2, 'type' => 'secundario', 'references' => 42, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Documento Soporte', 'url' => 'document_support', 'icon' => 'assignment_ind', 'position' => 2, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
        $menu->save(['option' => 'Ordenes de Compra', 'url' => 'purchaseOrder', 'icon' => 'assignment_returned', 'position' => 14, 'type' => 'primario', 'references' => null, 'status' => 'active', 'component' => 'controller', 'title' => null, 'description' => null, 'table' => null, 'to_list' => 'Si']);
    }
}