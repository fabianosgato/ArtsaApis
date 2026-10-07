<?php
/**
 * Fabiano Gato
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 *
 * Não editar ou acrescentar à este arquivo se você quiser fazer o upgrade para versões
 * mais recentes no futuro.
 *****************************************************
 *
 * @copyright    Copyright (c) Fabiano Gato
 * @author       Fabiano Gato <fabianogattoti@gmail.com>
 *
 */

namespace Modules\PaymentMethods\Http\Controllers;

use Idea\Framework\Admin\AdminController;
use Idea\Framework\Repository\PaymentsMethods\PaymentsMethodRepository;

class PaymentMethodsController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wsdadm.partials.grids', [
            'componentName' => 'paymentmethods::grids.payment-methods-grid'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert()
    {
        // Retorna a View
        return view('wsdadm.partials.forms', [
            'componentName' => 'paymentmethods::form.payment-methods-form',
            'data' => []
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $data = PaymentsMethodRepository::loadModel()::query()->find(
            $id
        )->toArray();

        // Retorna a View
        return view('wsdadm.partials.forms', [
            'componentName' => 'paymentmethods::form.payment-methods-form',
            'data' => $data
        ]);

    }

}
