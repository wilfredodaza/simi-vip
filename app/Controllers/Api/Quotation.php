<?php


namespace App\Controllers\Api;


use App\Models\Invoice;
use App\Models\LineInvoice;
use App\Models\LineInvoiceTax;
use App\Models\TrackingCustomer;
use App\Traits\DocumentTrait;
use App\Controllers\ApiController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Config as ConfigModel;


class Quotation extends ResourceController
{
    use DocumentTrait;

    protected $format = 'json';

    public function store()
    {
        $json = file_get_contents('php://input');
        $quotation = json_decode($json);

        $data = [
            'resolution'                => $quotation->number,
            'resolution_id'             => $quotation->type_document_id,
            'payment_forms_id'          => $quotation->payment_form->payment_form_id,
            'payment_methods_id'        => $quotation->payment_form->payment_method_id,
            'payment_due_date'          => ($quotation->payment_form->duration_measure == 0) ? date('Y-m-d') : date('Y-m-d'),
            'duration_measure'          => $quotation->payment_form->duration_measure,
            'type_documents_id'         => 100,
            'line_extesion_amount'      => $quotation->legal_monetary_totals->line_extension_amount,
            'tax_exclusive_amount'      => $quotation->legal_monetary_totals->tax_exclusive_amount,
            'tax_inclusive_amount'      => $quotation->legal_monetary_totals->tax_inclusive_amount,
            'allowance_total_amount'    => $quotation->legal_monetary_totals->allowance_total_amount,
            'charge_total_amount'       => $quotation->legal_monetary_totals->charge_total_amount,
            'payable_amount'            => $quotation->legal_monetary_totals->payable_amount,
            'customers_id'              => $quotation->customer->id,
            'created_at'                => date('Y-m-d H:i:s'),
            'invoice_status_id'         => 5,
            'notes'                     => $quotation->notes,
            'companies_id'              => Auth::querys()->companies_id,
            'idcurrency'                => isset($quotation->idcurrency) ? $quotation->idcurrency : 35,
            'calculationrate'           => isset($quotation->calculationrate) ? $quotation->calculationrate : 0,
            'calculationratedate'       => isset($quotation->calculationratedate) ? $quotation->calculationratedate : date('Y-m-d'),
            'status_wallet'             => 'Pendiente',
            'user_id'                   => Auth::querys()->id,
        ];


        $invoices       = new Invoice();
        $invoiceId      = $invoices->insert($data);
        $invoiceLines   = $quotation->invoice_lines;
        $this->_lineInvoice($invoiceLines, $invoiceId);


        if ($invoiceId) {
            $api = new ApiController();
            //$api->preview(session('user')->companies_id, $invoiceId);
            // $api->preview(Auth::querys()->companies_id, $invoiceId);
            return $this->respond([
                'status'    => '201',
                'message'   => 'Create',
                'data'      => $quotation
            ], 201);
        } else {
            return $this->respond([
                'status'    => 400,
                'error'     => 'Bad Request'
            ], 400);
        }
    }

    public function invoice($id)
    {
        $this->_getInvoice($id);
    }

    public function lineInvoice($id)
    {
        $this->_getLineInvoice($id);
    }

    public function update($id = null)
    {

        $json = file_get_contents('php://input');
        $quotation = json_decode($json);


        $invoiceLines = $quotation->invoice_lines;

        $data = [
            'payment_forms_id'          => $quotation->payment_form->payment_form_id,
            'payment_methods_id'        => $quotation->payment_form->payment_method_id,
            'payment_due_date'          => ($quotation->payment_form->duration_measure == 0) ? date('Y-m-d') : date('Y-m-d'),
            'duration_measure'          => $quotation->payment_form->duration_measure,
            'line_extesion_amount'      => $quotation->legal_monetary_totals->line_extension_amount,
            'tax_exclusive_amount'      => $quotation->legal_monetary_totals->tax_exclusive_amount,
            'tax_inclusive_amount'      => $quotation->legal_monetary_totals->tax_inclusive_amount,
            'allowance_total_amount'    => $quotation->legal_monetary_totals->allowance_total_amount,
            'charge_total_amount'       => $quotation->legal_monetary_totals->charge_total_amount,
            'payable_amount'            => $quotation->legal_monetary_totals->payable_amount,
            'customers_id'              => $quotation->customer->id,
            'created_at'                => date('Y-m-d H:i:s'),
            'invoice_status_id'         => 5,
            'notes'                     => $quotation->notes,
            //'user_id'                   => session('user')->id,
            'idcurrency'                => isset($quotation->idcurrency) ? $quotation->idcurrency : 35,
            'calculationrate'           => isset($quotation->calculationrate) ? $quotation->calculationrate : 0,
            'calculationratedate'       => date('Y-m-d'),

        ];



        foreach ($quotation->idDelete as $item) {
            $lineInvoiceTax = new LineInvoiceTax();
            $lineInvoiceTax->where(['line_invoices_id' => $item])->delete();
            $lineInvoice = new LineInvoice();
            $lineInvoice->where(['id' => $item])->delete();
        }

        $invoice = new Invoice();
        $invoice->set($data)
            ->where(['id' => $id])
            ->update();

        foreach ($invoiceLines as $value) {
            if(isset($value->id)){
                $line = [
                    'discount_amount'       => $value->allowance_charges[0]->amount,
                    'discounts_id'          => 1,
                    'quantity'              => $value->invoiced_quantity,
                    'line_extension_amount' => $value->line_extension_amount,
                    'price_amount'          => $value->price_amount,
                    'products_id'           => $value->product_id,
                    'description'           => $value->description
                ];
                $lineInvoice = new LineInvoice();
                $lineInvoice->set($line)
                    ->where(['id' => $value->id])
                    ->update();

                foreach ($value->tax_totals as $taxe) {
                    $tax = [
                        "taxes_id"          => $taxe->tax_id,
                        "tax_amount"        => $taxe->tax_amount,
                        "percent"           => $taxe->percent,
                        "taxable_amount"    => $taxe->taxable_amount
                    ];
                    $lineInvoiceTax = new LineInvoiceTax();
                    $lineInvoiceTax->set($tax)
                        ->where(['taxes_id' => $taxe->tax_id,'line_invoices_id' =>  $value->id ])
                        ->update();
                }
                if (isset($value->with_holding_tax_total)) {
                    foreach ($value->with_holding_tax_total as $retention) {
                        $tax = [
                            "taxes_id"          => $retention->tax_id,
                            "tax_amount"        => $retention->tax_amount,
                            "percent"           => $retention->percent,
                            "taxable_amount"    => $retention->taxable_amount
                        ];
                        $lineInvoiceTax = new LineInvoiceTax();
                        $lineInvoiceTax->set($tax)
                            ->where(['taxes_id' => $retention->tax_id, 'line_invoices_id' =>  $value->id])
                            ->update();
                    }

                }
            }else {
                $line = [
                    'discount_amount'       => $value->allowance_charges[0]->amount,
                    'discounts_id'          => 1,
                    'quantity'              => $value->invoiced_quantity,
                    'line_extension_amount' => $value->line_extension_amount,
                    'price_amount'          => $value->price_amount,
                    'products_id'           => $value->product_id,
                    'description'           => $value->name,
                    'invoices_id'           => $id
                ];
                $lineInvoice = new LineInvoice();
                $lineId = $lineInvoice->insert($line);

                foreach ($value->tax_totals as $taxe) {
                    $tax = [
                        "taxes_id"          => $taxe->tax_id,
                        "tax_amount"        => $taxe->tax_amount,
                        "percent"           => $taxe->percent,
                        "taxable_amount"    => $taxe->taxable_amount,
                        "line_invoices_id"  => $lineId
                    ];
                    $lineInvoiceTax = new LineInvoiceTax();
                    $lineInvoiceTax->insert($tax);
                }
                if (isset($value->with_holding_tax_total)) {
                    foreach ($value->with_holding_tax_total as $retention) {
                        $tax = [
                            "taxes_id"          => $retention->tax_id,
                            "tax_amount"        => $retention->tax_amount,
                            "percent"           => $retention->percent,
                            "taxable_amount"    => $retention->taxable_amount,
                            "line_invoices_id"  => $lineId
                        ];
                        $lineInvoiceTax = new LineInvoiceTax();
                        $lineInvoiceTax->insert($tax);
                    }

                }

            }

        }



            $api = new ApiController();
            // $api->preview(Auth::querys()->companies_id, $id);
            $this->respond([
                'status' => 201,
                'messge' => 'Create.',
                'data' => $quotation
            ], 201);




/*
        $this->respond([
            'status' => 400,
            'messge' => 'Bat Request.',
        ], 400);*/


    }

    public function generateFacture($id)
    {
         $notes = '';
        $config  = new ConfigModel();
        $configurations = $config->where(['companies_id' => Auth::querys()->companies_id ])->get()->getResult();
        if(count( $configurations) > 0 ) {
            $notes = "<br>".$configurations[0]->default_notes;
        }
        $json = file_get_contents('php://input');
        $quotation = json_decode($json);




        $dataInvoice = [
            'resolution'                => $quotation->number,
            'resolution_id'             => $quotation->resolution_number,
            'payment_forms_id'          => $quotation->payment_form->payment_form_id,
            'payment_methods_id'        => $quotation->payment_form->payment_method_id,
            'payment_due_date'          => ($quotation->payment_form->duration_measure == 0) ? date('Y-m-d') : $quotation->payment_form->payment_due_date,
            'duration_measure'          => $quotation->payment_form->duration_measure,
            'type_documents_id'         => $quotation->type_document_id,
            'line_extesion_amount'      => $quotation->legal_monetary_totals->line_extension_amount,
            'tax_exclusive_amount'      => $quotation->legal_monetary_totals->tax_exclusive_amount,
            'tax_inclusive_amount'      => $quotation->legal_monetary_totals->tax_inclusive_amount,
            'allowance_total_amount'    => $quotation->legal_monetary_totals->allowance_total_amount,
            'charge_total_amount'       => $quotation->legal_monetary_totals->charge_total_amount,
            'payable_amount'            => $quotation->legal_monetary_totals->payable_amount,
            'customers_id'              => $quotation->customer->id,
            'created_at'                => date('Y-m-d H:i:s'),
            'invoice_status_id'         => 1,
            'notes'                     => $notes,
            //'companies_id'              => session('user')->companies_id,
            'companies_id'              => Auth::querys()->companies_id,
            'idcurrency'                => isset($quotation->idcurrency) ? $quotation->idcurrency : 35,
            'calculationrate'           => isset($quotation->calculationrate) ? $quotation->calculationrate : 0,
            'calculationratedate'       => date('Y-m-d'),
            'resolution_credit'         => $quotation->id,
            'status_wallet'             => 'Pendiente',
            'user_id'                   => Auth::querys()->id,
        ];


        $tracking = new TrackingCustomer();
        $data = [
            'message'           => 'El usuario '.session('user')->username.' Genero la factura con No '. $quotation->number.' el dia '.date('Y-m-d H:i:s'). '.',
            'username'          => session('user')->username,
            'created_at'        => date('Y-m-d H:i:s'),
            'table_id'          => $id,
            'companies_id'      => session('user')->companies_id,
            'type_tracking_id'  => 1,
        ];
        $tracking->save($data);


        if($quotation->close){
            $invoice = new Invoice();
            $invoice->update(['id' => $quotation->id], ['invoice_status_id' => 6]);
            $tracking = new TrackingCustomer();
            $data = [
                'message'           => 'El usuario '.session('user')->username.' hace el cierre de la cotizacion el dia '.date('Y-m-d H:i:s'). '.',
                'username'          => session('user')->username,
                'created_at'        => date('Y-m-d H:i:s'),
                'table_id'          => $id,
                'companies_id'      => session('user')->companies_id,
                'type_tracking_id'  => 1,
            ];
            $tracking->save($data);
        }


        $invoices       = new Invoice();
        $invoiceId      = $invoices->insert($dataInvoice);
        $invoiceLines   = $quotation->invoice_lines;
        $this->_lineInvoice($invoiceLines, $invoiceId);

        $api = new ApiController();
        $api->preview(Auth::querys()->companies_id, $invoices->getInsertID());



        $this->respond([
            'status' => 201,
            'messge' => 'Create',
            'data'   => $quotation
        ], 201);
    }

    public function close($id = null)
    {
        $invoice = new Invoice();
        $invoice->update(['id' => $id], ['invoice_status_id' => 6]);




        $tracking = new TrackingCustomer();
        $data = [
            'message'           => 'El usuario '.session('user')->username.' hace el cierre de la cotizacion el dia '.date('Y-m-d H:i:s'). '.',
            'username'          => session('user')->username,
            'created_at'        => date('Y-m-d H:i:s'),
            'table_id'          => $id,
            'companies_id'      => session('user')->companies_id,
            'type_tracking_id'  => 1,
        ];
        $tracking->save($data);

        return $this->respond(['status' => 200]);
    }


}
