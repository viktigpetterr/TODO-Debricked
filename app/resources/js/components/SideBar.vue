<template>
    <div class="side-wrapper">
        <base-logo/>
        <categories/>
    </div>
</template>

<script>
import BaseLogo from "./SideBar/BaseLogo";
import Categories from "./SideBar/Categories";
export default {
    name: "SideBar",
    components: {
        Categories,
        BaseLogo
    },
}
</script>

<style scoped>
.side-wrapper {
    background-image: url("../../assets/carousel-graphic-svg.svg");
    background-size: cover;
    background-position: top right;
    width: 450px;
    height: 100%;
    position: absolute;
}
</style>
