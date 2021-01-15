<form action="{{ route(Request::route()->getName()) }}" method="get">
<div class="field has-addons search-input">
    <div class="control">
        <input type="text" class="input" name="search_input"
               value="{{ isset($text) ? $text : '' }}"
               placeholder="بحث ...">
    </div>
    <div class="control">
        <button class="button">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>
</form>
