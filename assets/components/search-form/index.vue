<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">What will you eat?</h5>
                <div :class="componentClass">
                    <span>
                        <label for="inOrOutSelect" class="col-form-label">
                            Eat in or take out?
                        </label>
                        <select class="form-control" name="inOrOutSelect" id="inOrOutSelect">
                            <option value="in">Eat In</option>
                            <option value="out">Eat Out</option>
                        </select>
                        <CuisineList></CuisineList>
                        <label for="postcode" class="col-form-label">
                            Enter your postcode
                        </label>
                        <input type="text" name="postcode" id="postcode" class="form-control"/>
                        <span>
                            <a class="alert-link" @click="locationClicked">Use my location instead...</a>
                        </span>
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
<script>
    import CuisineList from '../search-form/cuisine-list'
    export default {
        name: 'Form',
        components: {CuisineList},
        data() {
            return {
                userLong: null,
                userLang: null,
                userLocation: null,

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
            locationClicked() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(this.showPosition);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            },
            showPosition(position) {
                this.userLang = position.coords.latitude;
                this.userLong = position.coords.longitude;
            }
        }
    }
</script>
<style lang="scss" module>
    .component {
        text-align: center;
    }

</style>
