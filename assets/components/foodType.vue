<template>
    <div>
        <label for="cuisine_select" class="col-form-label">What do you Fancy?</label>
        <select name="cuisine_select" id="cuisine_select" class="form-control">
            <option v-for="cuisine in cuisines" :value="cuisine.name">
                {{cuisine.name}}
            </option>

        </select>
    </div>
</template>
<script>
    export default {
        name: 'foodType',
        data() {
            return {
                cuisines : [
                    {name: 'Indian'},
                    {name: 'Chinese'},
                    {name: 'American'},
                    {name: 'Italian'},
                    {name: 'Mexican'},
                    {name: 'Thai'}
                ]

            }
        }

    }
</script>