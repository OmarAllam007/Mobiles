<fieldset>
    <legend>{{t('Memory')}}</legend>
</fieldset>
<div class="form-group">
    <p>{{t('Internal Memory')}}</p>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="16"
               @if(isset($mobile['internal_storage']) && in_array(16,$mobile['internal_storage'])) checked
               @endif name="internal_storage[]">
        16
    </label>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="32" name="internal_storage[]"
               @if(isset($mobile['internal_storage']) && in_array(32,$mobile['internal_storage'])) checked
                @endif
        > 32
    </label>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="64" name="internal_storage[]"
               @if(isset($mobile['internal_storage']) && in_array(64,$mobile['internal_storage'])) checked
                @endif
        > 64
    </label>

    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="128" name="internal_storage[]"
               @if(isset($mobile['internal_storage']) && in_array(128,$mobile['internal_storage'])) checked
                @endif
        > 128
    </label>

    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="256" name="internal_storage[]"
               @if(isset($mobile['internal_storage']) && in_array(256,$mobile['internal_storage'])) checked
                @endif
        > 256
    </label>
</div>

<div class="form-group">
    <p>{{t('RAM')}}</p>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="1" name="ram[]"
               @if(isset($mobile['ram']) && in_array(1,$mobile['ram'])) checked
                @endif
        > 1
    </label>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="2" name="ram[]"
               @if(isset($mobile['ram']) && in_array(2,$mobile['ram'])) checked
                @endif
        > 2
    </label>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="3" name="ram[]"
               @if(isset($mobile['ram']) && in_array(3,$mobile['ram'])) checked
                @endif
        > 3
    </label>

    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="4" name="ram[]"
               @if(isset($mobile['ram']) && in_array(4,$mobile['ram'])) checked
                @endif
        > 4
    </label>

    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="5" name="ram[]"
               @if(isset($mobile['ram']) && in_array(5,$mobile['ram'])) checked
                @endif
        > 5
    </label>

    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="6" name="ram[]"
               @if(isset($mobile['ram']) && in_array(6,$mobile['ram'])) checked
                @endif
        > 6
    </label>
</div>

<div class="form-group">
    <p>{{t('External Storage')}}</p>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="16" name="external_storage[]"

               @if(isset($mobile['external_storage']) && in_array(16,$mobile['external_storage'])) checked
                @endif> 16
    </label>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="32" name="external_storage[]"
               @if(isset($mobile['external_storage']) && in_array(32,$mobile['external_storage'])) checked
                @endif
        > 32
    </label>
    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="64" name="external_storage[]"
               @if(isset($mobile['external_storage']) && in_array(64,$mobile['external_storage'])) checked
                @endif
        > 64
    </label>

    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="128" name="external_storage[]"
               @if(isset($mobile['external_storage']) && in_array(128,$mobile['external_storage'])) checked
                @endif
        > 128
    </label>

    <label class="checkbox-inline custom-checkbox">
        <input type="checkbox" value="256" name="external_storage[]"
               @if(isset($mobile['external_storage']) && in_array(256,$mobile['external_storage'])) checked
                @endif
        > 256
    </label>
</div>