<template>
    <div>
        <div class="card"  v-show="!formHidden">
            <div class="card-body">
                <h5 class="card-title text-center">What will you eat?</h5>
                <div :class="componentClass">
                    <span>
                        <in-or-out/>
                        <food-type :current-value="currentValue" :cuisines="cuisines" />
                        <button class="btn btn-info form-control" @click="randomClicked">
                            Pick my cuisine for me!
                        </button>
                        <postcode-type  />
                        <br>
                    </span>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary col-4 offset-4" @click="$emit('do-search')">
                        Feed me!
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" module>
    .component {
        text-align: center;
    }

</style>
<script>
    import FoodType from '../components/foodType'
    import PostcodeType from '../components/postcodeType'
    import InOrOut from '../components/inOrOut'
    export default {
        name: 'Form',
        components : {
            FoodType,
            PostcodeType,
            InOrOut
        },
        props: {
            formHidden: {
                type: Boolean,
                required: true
            },
        },
        data() {
            return {
                currentValue: 'Please Select',
                cuisines : [
                    {name: 'Please Select'},
                    {name: 'Indian'},
                    {name: 'Chinese'},
                    {name: 'American'},
                    {name: 'Italian'},
                    {name: 'Mexican'},
                    {name: 'Thai'}
                ]
            }
        },
        computed: {
            /**
             *
             * @returns array
             */
            componentClass() {
                const classes = [this.$style.component, 'p-3', 'mb-2'];
                if (this.collapsed) {
                    classes.push(this.$style.collapsed);
                }
                return classes;
            }
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