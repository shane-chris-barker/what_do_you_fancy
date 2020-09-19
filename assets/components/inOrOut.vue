<template>
    <div>
        <label for="inOrOutSelect" class="col-form-label">
            Eat in or take out?
        </label>
        <select class="form-control" name="inOrOutSelect" id="inOrOutSelect">
            <option value="in">Eat In</option>
            <option value="out">Eat Out</option>
        </select>

    </div>
</template>
<script>
    export default {
        name:'inOrOut'
    }
</script>