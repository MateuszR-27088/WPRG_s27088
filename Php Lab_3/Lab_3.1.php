<?php
?>
<form action="Lab_3.1.php">
    <fieldset>
        <legend>Formularz kontaktowy</legend>
        <table>
            <tr>
                <td>Imie i Nazwisko *</td>
                <td><input namesurname="imie i nazwisko"></td>
            </tr>
            <tr>
                <td>Adres e-mail *</td>
                <td><input type="email"></td>
            </tr>
            <tr>
                <td>Telefon kontaktowy *</td>
                <td><input type="number"></td>
            </tr>
            <tr>
                <td>Wybierz temat </td>
                <td><select>name theme="temat" size=2
                        <option>Wykonanie strony internetowej</option>
                        <option>Poprawa strony internetowej</option>
                    </select></td>
            </tr>
            <tr>
                <td>Tresc wiadomosci </td>
                <td><textarea></textarea> </td>
            </tr>
            <tr>
                <td>Preferowana forma kontaktu:</td></tr>
            <tr>
                <td><input type="checkbox"name="email"value="E-mail"> E-mail </td></tr>
            <tr>
                <td><input type="checkbox"name="telefon"value="telefon"> Telefon </td></tr>
            <tr>
                <td> Posiadasz juz strone www?</td></tr>
            <tr>
                <td><input type="radio"> Tak </td></tr>
            <tr>
                <td><input type="radio"> Nie </td></tr>
            <tr>
                <td>Zalaczniki</td></tr>
            <tr>
                <td><input type="button" value="Wybierz plik"> Nie wybrano pliku </td></tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Wyslij formularz"></td>
            </tr>
        </table>
    </fieldset>
</form>
