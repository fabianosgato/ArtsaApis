<?php
/**
 * Fabiano Gato
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 *
 *****************************************************
 *
 * @copyright    Copyright (c) Fabiano Gato
 * @author       Fabiano Gato <fabianogattoti@gmail.com>
 *
 */
namespace Modules\PaymentMethods\Livewire\Form;

use App\Models\PaymentsMethod;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Idea\Framework\Repository\PaymentsMethods\PaymentsMethodRepository;
use Idea\Framework\View\Wsdadm\Components\FormComponent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class PaymentMethodsForm extends FormComponent
{

    protected function getTitle(): string
    {
        return 'Metodos de pagamento de Teste';
    }

    protected function getDescription(): string
    {
        if ($this->isEditing()) {
            return "Atualizar Metodos de pagamento: {$this->data['payment_name']}";
        }
        return 'Inserir um novo Metodos de pagamento';
    }

    protected function getSuccessBody(): string
    {
        return 'O Metodos de pagamento foi inserido/atualizado com sucesso.';
    }

    protected function getRedirectUrl(): ?string
    {
        return route('wsdadm.payments');
    }

    protected function saveData(array $data): ?Model
    {

        $paymentsMethod = PaymentsMethodRepository::updateOrCreate(
            id:$data['payment_method_id'] ?? null,
            values:$data
        );

        if (!empty($data['payment_method_id'])) {
            Session::flash('success', 'Módulo atualizado com sucesso!');

        } else {
            Session::flash('success', 'Módulo criado com sucesso!');

        }

        return $paymentsMethod;

    }

    protected function getFormSchema(): array
    {
        return [
            Tabs::make('Tabs')->tabs([

                Tab::make('Informações do Método de Pagamento')->schema([

                    Hidden::make('payment_method_id'),

                    TextInput::make('payment_name')
                        ->label('Nome do Método')
                        ->required(),

                    TextInput::make('payment_account_id')
                        ->label('ID da conta de teste/homologação')
                        ->required(),

                    TextInput::make('payment_key')
                        ->label('PublicKey do Ambiente de teste/homologação'),

                    TextInput::make('payment_secret')
                        ->label('SecretKey do Ambiente teste/homologação'),

                    Radio::make('status')
                        ->label('Status de Ativação')
                        ->boolean()
                        ->options([
                            true => 'Habilitado',
                            false => 'Desabilitado'
                        ])
                ]),

            ]),

        ];
    }

    protected function getModel(): string
    {
        return PaymentsMethod::class;
    }
}
