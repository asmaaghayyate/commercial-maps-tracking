<div>
    @if (!empty($data) && $data->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>N° Facture</th>
                    <th>Date Facture</th>
                    <th>Client</th>
                    <th>Type Service</th>
                    <th>Taux TVA</th>
                    <th>M HT</th>
                    <th>TVA</th>
                    <th>TTC</th>
                    <th>status</th>
                    <th class="text-center col-5">mode</th>
                    <th class="text-center col-5">Montant</th>
                    <th class="text-center col-5">Date</th>
                    <th class="text-center col-5">N° Cheque | Effet</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    @forelse ($item->Payement as $payement)
                        <tr>
                            <td class="text-center">{{ $item->n_facture }}</td>
                            <td class="text-center">{{ $item->date_facture }}</td>
                            <td class="text-center">{{ $item->getClientName() }}</td>
                            <td class="text-center">{{ $item->getTypeService() }}</td>
                            <td class="text-center">{{ $item->getTauxTva() }}</td>
                            <td class="text-center">{{ $item->getMantantHt() }}</td>
                            <td class="text-center">{{ $item->getTotalTva() }}</td>
                            <td class="text-center">{{ $item->getMantantTTC() }}</td>
                            <td class="text-center">{{ $item->status->lang() }}</td>
                            <td class="text-center">{{ $payement->mode }}</td>
                            <td class="text-center">{{ $payement->montant }}</td>
                            <td class="text-center">{{ $payement->date_paiement }}</td>
                            <td class="text-center">{{ $payement->numero_cheque }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">{{ $item->n_facture }}</td>
                            <td class="text-center">{{ $item->date_facture }}</td>
                            <td class="text-center">{{ $item->getClientName() }}</td>
                            <td class="text-center">{{ $item->getTypeService() }}</td>
                            <td class="text-center">{{ $item->getTauxTva() }}</td>
                            <td class="text-center">{{ $item->getMantantHt() }}</td>
                            <td class="text-center">{{ $item->getTotalTva() }}</td>
                            <td class="text-center">{{ $item->getMantantTTC() }}</td>
                            <td class="text-center">{{ $item->status->lang() }}</td>
                            <td colspan="5" class="text-center">
                                No payments found for this invoice
                            </td>
                        </tr>
                    @endforelse
                @empty
                    <tr>
                        <td colspan="18" class="text-center">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @else
        <p>No data available.</p>
    @endif
</div>
