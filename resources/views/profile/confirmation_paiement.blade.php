@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Confirmer mes paiements</h2>
            </div>
        </div>
    </div>
</div>

<div class="invoice-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Rate/Item</th>
                                                <th>Quantity</th>
                                                <th>Discount (%)</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Dreams Rental Cars</td>
                                                <td>Kia Soul</td>
                                                <td>$1,110</td>
                                                <td>2</td>
                                                <td>2 %</td>
                                                <td>$2,220</td>
                                                <td><button class="btn btn-primary check-available w-100" type="button" data-bs-toggle="modal" data-bs-target="#pages_edit">
                                                        Télécharger image ici <i class="fa fa-upload"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal custom-modal fade check-availability-modal" id="pages_edit" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="booking-info pay-amount">
                                                                        <h6>Téléverser la capture d'ecran de votre paiement ici !</h6>
                                                                        <div class="radio">
                                                                            <label>
                                                                                <input type="file" name="file"> Téléverser ici
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Go to Details <i class="fa-solid fa-arrow-right"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection