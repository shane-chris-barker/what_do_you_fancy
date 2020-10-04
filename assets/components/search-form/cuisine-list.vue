<template>
    <div>
        <label for="cuisine_select" class="col-form-label">What do you Fancy?</label>
        <select name="cuisine_select" id="cuisine_select" class="form-control">
            <option v-for="cuisine in cuisines"
                    :key="cuisine.name"
                    :value="cuisine.name"
                    :selected="cuisine.name === currentValue"
            >
                {{cuisine.name}}
            </option>
        </select>
        <button class="btn btn-info form-control" @click="randomClicked">
            Pick my cuisine for me!
        </button>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        name: 'CuisineList',
        data() {
            return {
                currentValue: 'Please Select',
                cuisines :      []
            }
        },
        async mounted() {
            const cuisineResponse = await axios.get('/api/cuisines');
            this.cuisines = cuisineResponse.data;
        },
        methods: {
            randomClicked() {
                const count = this.cuisines.length - 1;
                const randomIndex = Math.floor(Math.random() * count) + 1;
                this.currentValue = this.cuisines[randomIndex].name;
            },
        }
    }
</script>
