<div id="weekend_form" title="Template Automat v1" style="display:none">
    <div align="left">
       Dies ist der Template Automat er hat bereits bestimmte<br>
       Events in seiner Liste!
    
    <br>
    Bitte wähle aus:
    <form id="weekform">
        <select id="weekend" name="weekend">
            <option value="1">Wochenende</option>
            <option value="2">Feiertag</option>
            <option value="3">Krank</option>
        </select>
        <p>
        Datum:<br>
        <input type="text" id="pickadate" name="pickdate" value="{$smarty.now|date_format:"%d.%m.%Y"}">
        <input type="submit" id="submit_week" value="Eintragen">
        </p>
    </form>
    </div>
</div>

<div id="holiday_form" title="Urlaub eintragen" style="display:none">
    <div align="left">
       Hier kannst du deinen Urlaubsbegin und das Urlaubsende<br />
       bequem Eintragen und das Programm trägt Ihn für dich ein!  
    <br>
    <form id="holidayform">
        <p>
        Datum begin:<br />
        <input type="text" id="pickadate1" name="pickdate1" value="{$smarty.now|date_format:"%d.%m.%Y"}">
        <br />
        Datum ende:<br />
        <input type="text" id="pickadate2" name="pickdate2">
        </p>
        <p>
        <input type="submit" id="submit_holiday" value="Eintragen">
        </p>
    </form>
    </div>
</div>