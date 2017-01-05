@if( isset( $strFormNaam ) && ! empty( $strFormNaam ) )
    <div>Hoi {{$strFormNaam}}, <br> Bedankt voor het invullen van mijn contactformulier.<br> U heeft de volgende gegevens ingegeven.</div>

@else 
    <div>Hoi! <br> Bedankt voor het invullen van mijn contactformulier.<br> U heeft de volgende gegevens ingegeven.</div>

@endif
<br>
<br>
<table>
<tr>
<td>Naam: </td>
<td>{{$strFormNaam}}</td>
</tr>
<tr>
<td>E-mailadres: </td>
<td>{{$strFormEmail}}</td>
</tr>
<tr>
<td>Onderwerp: </td>
<td>{{$strFormSubject}}</td>
</tr>
<tr>
<td>Onderwerp: </td>
<td>{{$strFormBericht}}</td>
</tr>
</table>
<br>
<br>
Met vriendelijke groet,<br>
Annelie Smits
