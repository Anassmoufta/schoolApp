<html>

<head>
    <title>Receipt_{{ $pr->ref_no . '_' . $sr->user->name }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/receipt.css') }}" />
</head>

<body>
    <div class="container">
        <div id="print" xmlns:margin-top="http://www.w3.org/1999/xhtml">
            {{--  School Details --}}
            <table width="100%">
                <tr>
                    <td>
                        <strong><span
                                style="color: #1b0c80; font-size: 25px;">{{ strtoupper(Qs::getSetting('system_name')) }}</span></strong><br />
                        {{-- <strong><span style="color: #1b0c80; font-size: 20px;">MINNA, NIGER STATE</span></strong><br/> --}}
                        <strong><span
                                style="color: #000; font-size: 15px;"><i>{{ ucwords($s['address']) }}</i></span></strong>
                        <br /> <br />
            
                        <span style="color: #000; font-weight: bold; font-size: 25px;">REÇU DE PAIEMENT</span>
                    </td>
                </tr>
            </table>
            

            {{-- Background Logo --}}
            <div style="position: relative;  text-align: center; ">
                <img src="{{ $s['logo'] }}"
                    style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.1; margin-left: auto;margin-right: auto; left: 0; right: 0;" />
            </div>

            {{-- Receipt No --}}
            <div class="bold arial"
            style="text-align: center; float:right; width: 200px; padding: 5px; margin-right:30px">
            <div style="padding: 10px 20px; width: 200px; background-color: lightcyan;">
                <span style="font-size: 16px;">Numéro de référence du reçu</span>
            </div>
            <div style="padding: 10px 20px; width: 200px; background-color: lightyellow;">
                <span style="font-size: 25px;">{{ $pr->ref_no }}</span>
            </div>
        </div>
        

            <div style="clear: both"></div>

            {{-- Informations sur l'étudiant --}}
<div style="margin-top:5px; display: block; background-color: rgba(92, 172, 237, 0.12); padding: 5px; ">
    <span style="font-weight:bold; font-size: 20px; color: #000; padding-left: 10px">INFORMATIONS SUR L'ÉTUDIANT</span>
</div>

{{-- Photo --}}
<div style="margin: 15px;">
    <img style="width: 100px; height: 100px; float: left;" src="{{ $sr->user->photo }}" alt="...">
</div>

<div style="float: left; margin-left: 20px">
    <table style="font-size: 16px" class="td-left" cellspacing="5" cellpadding="5">
        <tr>
            <td class="bold">NOM :</td>
            <td>{{ $sr->user->name }}</td>
        </tr>
        <tr>
            <td class="bold">N°_ADM :</td>
            <td>{{ $sr->adm_no }}</td>
        </tr>
        <tr>
            <td class="bold">CLASSE :</td>
            <td>{{ $sr->my_class->name }}</td>
        </tr>
    </table>
</div>
<div class="clear"></div>

{{-- Informations sur le paiement --}}
<div style="margin-top:5px; display: block; background-color: rgba(92, 172, 237, 0.12); padding: 5px; ">
    <span style="font-weight:bold; font-size: 20px; color: #000; padding-left: 10px">INFORMATIONS SUR LE PAIEMENT</span>
</div>

<table class="td-left" style="font-size: 16px" cellspacing="2" cellpadding="2">
    <tr>
        <td class="bold">RÉFÉRENCE :</td>
        <td>{{ $payment->ref_no }}</td>
        <td class="bold">TITRE :</td>
        <td>{{ $payment->title }}</td>
    </tr>
    <tr>
        <td class="bold">MONTANT :</td>
        <td>{{ $payment->amount }}</td>
        <td class="bold">DESCRIPTION :</td>
        <td>{{ $payment->description }}</td>
    </tr>
</table>


            {{-- Description du paiement --}}
<div style="margin-top:5px; display: block; background-color: rgba(92, 172, 237, 0.12); padding: 5px; ">
    <span style="font-weight:bold; font-size: 20px; color: #000; padding-left: 10px">DESCRIPTION</span>
</div>

<table class="td-left" style="font-size: 16px" width="100%" cellspacing="2" cellpadding="2">
    <thead>
        <tr>
            <td class="bold">Date</td>
            <td class="bold">Montant payé <del style="text-decoration-style: double">N</del></td>
            <td class="bold">Solde <del style="text-decoration-style: double">N</del></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($receipts as $r)
            <tr>
                <td>{{ date('D\, j F\, Y', strtotime($r->created_at)) }}</td>
                <td>{{ $r->amt_paid }}</td>
                <td>{{ $r->balance }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<hr>
<div class="bold arial"
    style="text-align: center; float:right; width: 200px; padding: 5px; margin-right:30px">
    <div style="padding: 10px 20px; width: 200px; background-color: lightcyan;">
        <span style="font-size: 16px;">{{ $pr->paid ? 'STATUT DU PAIEMENT' : 'TOTAL DÛ' }}</span>
    </div>
    <div style="padding: 10px 20px; width: 200px; background-color: lightyellow;">
        <span style="font-size: 25px;">{{ $pr->paid ? 'RÉGLÉ' : $pr->balance }}</span>
    </div>
</div>
<div class="clear"></div>

    <script>
        window.print();
    </script>
</body>

</html>
