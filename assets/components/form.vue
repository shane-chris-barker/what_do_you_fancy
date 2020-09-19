<template>
    <div>
        <div class="card"  v-show="!formHidden">
            <div class="card-body">
                <h5 class="card-title text-center">What will you eat?</h5>
                <div :class="componentClass">
                    <span>
                        <a href="#" class="btn btn-info" @click="randomClicked">
                            Use my location and pick it all for me!
                        </a>
                        <food-type/>
                        <postcode-type  />
                        <in-or-out/>
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
                type:Boolean,
                required: true
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
                this.$emit('generate-random');
            }
        }
    }

</script>