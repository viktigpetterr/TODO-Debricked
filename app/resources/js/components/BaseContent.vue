<template>
    <div class="wrapper">
        <div class="center-wrapper">
            <h4>{{ categoryName }}</h4>
            <todos/>
        </div>
    </div>
</template>

<script>
import Todos from "./BaseContent/Todos"

export default {
    name: 'BaseContent',
    components: {
        Todos,
    },
    computed: {
        categoryName() {
            return this.$store.getters.categoryName
        }
    }
}
</script>

<style scoped>
    .wrapper {
        position: absolute;
        height: 100%;
        left: 450px;
        right: 0;
    }

    .center-wrapper {
        margin-top: 120px;
        margin-left: 10%;
        margin-right: 10%
    }

</style>
