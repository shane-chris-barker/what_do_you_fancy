<template>
    <div>
        <label for="postcode" class="col-form-label">
            Enter your postcode
        </label>
        <input type="text" name="postcode" id="postcode" class="form-control"/>
        <span><a class="card-link">Use my location instead...</a></span>
    </div>
</template>
<script>
    export default {
        name: 'postcodeType'
    }
</script>