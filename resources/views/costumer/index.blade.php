@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cadastro de clientes</h5>
            <h6 class="card-subtitle mb-2 text-muted">Preencha o cadastro abaixo</h6>
            <hr>
            <form id="costumerForm" class="card-text" action="{{url('cliente')}}" method="post" onchange="validateForm()" onsubmit="validateForm()">
                {!! csrf_field() !!}
                <div class="form-group row">
                    <label class="col-4">Tipo de cadastro</label>
                    <div class="col-8">
                        <label class="custom-control custom-radio">
                            <input name="costumer[costumer_type]" type="radio" class="custom-control-input" value="CostumerPeople" checked>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Pessoa física</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input name="costumer[costumer_type]" type="radio" class="custom-control-input" value="CostumerEnterprise">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Pessoa jurídica</span>
                        </label>
                    </div>
                </div>
                <section class="costumer_type" data-type="CostumerPeople">
                    <div class="form-group row">
                        <label for="CostumerPeople[document]" class="col-4 col-form-label">CPF</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="CostumerPeople[document]" data-mask="cpf" name="CostumerPeople[document]" placeholder="000.000.000-00" type="text" class="form-control here" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CostumerPeople[name]" class="col-4 col-form-label">Nome</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="CostumerPeople[name]" name="CostumerPeople[name]" placeholder="Primerio nome" type="text" required="required" class="form-control here">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CostumerPeople[last_name]" class="col-4 col-form-label">Sobrenome</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="CostumerPeople[last_name]" name="CostumerPeople[last_name]" placeholder="Último nome" type="text" class="form-control here" required="required" maxlength="15">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CostumerPeople[birthday]" class="col-4 col-form-label">Data de nascimento</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="CostumerPeople[birthday]" name="CostumerPeople[birthday]" data-mask="date" onchange="checkAge(this)" placeholder="00/00/0000" type="text" class="form-control here" required="required">
                            </div>
                            <span id="birthday_help" class="form-text text-muted">A idade mínima para cadastro é de 19 anos.</span>
                        </div>
                    </div>
                </section>
                <section class="costumer_type" data-type="CostumerEnterprise" style="display: none;">
                    <div class="form-group row">
                        <label for="CostumerEnterprise[document]" class="col-4 col-form-label">CNPJ</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="CostumerEnterprise[document]" name="CostumerEnterprise[document]" data-mask="cnpj" placeholder="00.000.000/0000-00" type="text" required="required" class="form-control here">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CostumerEnterprise[social_name]" class="col-4 col-form-label">Razão social</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="CostumerEnterprise[social_name]" name="CostumerEnterprise[social_name]" placeholder="Razão social" type="text" required="required" class="form-control here">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CostumerEnterprise[business_name]" class="col-4 col-form-label">Nome fantasia</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="CostumerEnterprise[business_name]" name="CostumerEnterprise[business_name]" placeholder="Nome fantasia" type="text" required="required" class="form-control here">
                            </div>
                        </div>
                    </div>
                </section>
                <div class="form-group row">
                    <label for="costumer[zipcode]" class="col-4 col-form-label">CEP</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="costumer[zipcode]" name="costumer[zipcode]" data-mask="cep" placeholder="00000-000" type="text" required="required" class="form-control here" onkeyup="getAddressByZipCode(this)">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="costumer[address]" class="col-4 col-form-label">Logradouro</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="costumer[address]" name="costumer[address]" placeholder="Avenida, rua, estrada, rodovia..." type="text" required="required" class="form-control here">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="costumer[number]" class="col-4 col-form-label">Número</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="costumer[number]" name="costumer[number]" placeholder="Número" type="text" required="required" class="form-control here">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="costumer[complement]" class="col-4 col-form-label">Complemento</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="costumer[complement]" name="costumer[complement]" placeholder="Complemento " type="text" class="form-control here">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="costumer[neighborhood]" class="col-4 col-form-label">Bairro</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="costumer[neighborhood]" name="costumer[neighborhood]" placeholder="Bairro" type="text" class="form-control here">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="costumer[city]" class="col-4 col-form-label">Cidade</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="costumer[city]" name="costumer[city]" placeholder="Cidade" type="text" class="form-control here">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="costumer[state]" class="col-4 col-form-label">UF</label>
                    <div class="col-8">
                        <div class="input-group">
                            <input id="costumer[state]" name="costumer[state]" placeholder="Estado" maxlength="8" type="text" class="form-control here">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8 text-right">
                        <button name="submit" type="submit" class="btn btn-primary" disabled>Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            window.setMask('input[data-mask="cpf"]', 'cpf');
            window.setMask('input[data-mask="cnpj"]', 'cnpj');
            window.setMask('input[data-mask="cep"]', 'cep');
            window.setMask('input[data-mask="date"]', 'date');

            $('input[name="costumer[costumer_type]"]').on('change', function () {
                let type = $(this).val();
                let selector = 'section[data-type="'+type+'"]';
                $('section.costumer_type').hide();
                $('section.costumer_type input').removeAttr('required');
                $(selector).attr('required', 'required').show();
            });
        });

        function getAddressByZipCode(elem) {
            let zipcode = $(elem).val();
            if(zipcode.length >= 8){
                $.ajax({
                        url: 'https://viacep.com.br/ws/' + zipcode + '/json/',
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        type: 'GET',
                        dataType: 'json',
                        success: function (result) {
                            $('input[name="costumer[address]"]').val(result.logradouro);
                            $('input[name="costumer[neighborhood]"]').val(result.bairro);
                            $('input[name="costumer[city]"]').val(result.localidade);
                            $('input[name="costumer[state]"]').val(result.uf);
                            $('input[name="costumer[number]"]').focus();
                        }
                    }
                )
            }
        }

        function checkAge(elem) {
            let birthday = $(elem).val();
            let age = calculateAge(birthday);
            let invalid = age < 19;
            if(invalid)
                alert('Infelizmente você ainda não tem idade para realizar esse cadastro! :(');
        };

        function calculateAge(birthday) {
            var today = new Date();
            var birthDate = new Date(birthday);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        function validateForm() {
            let validAge = calculateAge( $('input[name="CostumerPeople[birthday]"]').val() ) >= 19;
            console.log(validAge);
            let FormIsValid = !$('form#costumerForm').validate().checkForm() || !validAge;
            $('form#costumerForm button[type="submit"]').prop('disabled', FormIsValid);
            return FormIsValid;
        }
    </script>
@endpush
