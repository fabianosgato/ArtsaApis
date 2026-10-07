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

namespace Modules\PaymentMethods\Livewire\Grids;

use App\Models\PaymentsMethod;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Idea\Framework\Admin\Grids\Grid;
use Idea\Framework\Repository\PaymentsMethods\PaymentsMethodRepository;


final class PaymentMethodsGrid extends Grid
{

    public string $heading = 'Método de Pagamentos para testes';
    public string $primaryKey = 'payment_name';
    public string $sortDirection = 'ASC';

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(PaymentsMethodRepository::getData())
            ->heading($this->heading)
            ->columns([
                TextColumn::make('payment_name')
                    ->label("Método de Pagamento")
                    ->toggleable(false)
                    ->searchable(['payment_name']),

                TextColumn::make('payment_key')
                    ->label("Key")
                    ->verticallyAlignCenter()
                    ->alignCenter()
                    ->toggleable(false)
                    ->searchable(['payment_key']),

                TextColumn::make('payment_secret')
                    ->label("Secret Key")
                    ->verticallyAlignCenter()
                    ->alignCenter()
                    ->toggleable(false)
                    ->searchable(['payment_secret']),

                TextColumn::make('status')
                    ->label("Ativo")
                    ->toggleable(false)
                    ->verticallyAlignCenter()
                    ->alignCenter()
                    ->searchable(['sys_users.status'])
                    ->formatStateUsing(function ($state) {
                        return ($state == 1 ? 'Habilitado' : 'Desabilitado');
                    })
                    ->extraHeaderAttributes([
                        'class' => 'w-8'
                    ]),

            ])
            ->recordActions([

                ActionGroup::make([

                    // Edicao do Grupo
                    Action::make('edit')
                        ->label('Editar')
                        ->url(fn(PaymentsMethod $record): string => route('wsdadm.payments.edit', [
                            'id' => $record->payment_id
                        ])),

                    DeleteAction::make()
                        ->label('Excluir')
                        ->icon(null)
                        ->modalHeading("Excluir Método de Pagamento")
                        ->modalDescription("Deseja Excluir esse Método de Pagamento?")
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title('Módulo do sistema Excluído')
                                ->body('O Método de Pagamento foi excluido com sucesso'),
                        ),

                ])
            ])
            ->paginationPageOptions(
                options: $this->paginationPageOptions
            )
            ->striped()
            ->recordUrl(null)
            ->defaultSort(
                column: $this->primaryKey,
                direction: $this->sortDirection
            )
            ->persistFiltersInSession();


    }

}
