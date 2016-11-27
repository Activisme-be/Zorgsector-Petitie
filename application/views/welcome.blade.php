@layout('layouts/frontend')

@section('content')
    <div style="margin-bottom: -22px;" class="row">
        <div class="col-sm-12">
            <div style="border-radius:0px; border: 0px;" class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        @if(isset($_SESSION['class']) && isset($_SESSION['message']))
                            <div class="{{ $_SESSION['class'] }}">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ $_SESSION['message'] }}
                            </div>
                        @endif

                        <div class="pull-right">
                            {{ $signatures }} / <strong>{{ $this->config->item('sign_count') }}</strong> Handtekeningen.
                        </div>

                        <h2>Beste vrienden sympathisanten,</h2>

                        <p>
                            Deze web pagina is na het lang twijfelen er toch door gekomen door de vraag en het aanbod.
                            Via deze weg kunnen we alle lopende petities en acties toch op een treffelijke manier aanbieden en bundelen .
                            door besparingen, regeringsmaatregelen, privatiseren en andere oorzaken is er soms nood aan actie en petities om een alternatief die menselijk een eerlijk is naar voor te schuiven.
                            Soms is de weg naar deze acties moeilijk te bereiken door de vele petities die er al zijn.
                        </p>

                        <p>
                            Hier vind je ook de link naar de Facebook pagina waar je alles mooi kan volgen.
                            Ook de geplande acties en evenementen worden mooi gedeeld.
                            Iedereen alvast bedankt en welkom op mijn pagina !
                        </p>

                        <hr>

                        {{-- Signature form --}}
                        <form id="signature" action="{{ base_url('signature/insert') }}" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="text" v-model="signature.name" class="form-control" name="name" placeholder="Voor en Achternaam">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2">
                                    <select class="form-control" v-model="signature.day" name="day" id="">
                                        <option value="">-- Dag --</option>

                                        @for ($int = 1; $int < 32; $int++)
                                            @if ($int < 10)
                                                <option value="0{{ $int }}">
                                                    0{{ $int }}
                                                </option>
                                            @else
                                                <option value="{{ $int }}">
                                                    {{ $int }}
                                                </option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <select class="form-control" v-model="signature.month" name="month" id="">
                                        <option value="">-- Maand --</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maart</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Augustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <select class="form-control" v-model="signature.year" name="year" id="">
                                        <option value=""> -- Jaar --</option>

                                        @for ($jaar = 1916; $jaar < 2017; $jaar++)
                                            <option value="{{ $jaar }}">
                                                {{ $jaar }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-sm-8">
                                    <span class="help-block"><i>(Geboortedatum)</i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="text" v-model="signature.email" class="form-control" placeholder="Uw Email adres" name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="text" name="city" v-model="signature.city" class="form-control" placeholder="Woonplaats">
                                </div>
                            </div>

                            <div class="form-group" v-if="! submitted">
                                <div class="col-sm-9">
                                    <button type="submit" v-attr="disabled: errors" class="btn btn-success">Sign!</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </form>
                        {{-- /Signature form --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection