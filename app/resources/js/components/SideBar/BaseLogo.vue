<template>
    <div class="top-wrapper">
        <a href="https://app.debricked.com/">
            <div class="logo-text">
                <span>TODO@</span><b>de</b><span>bricked</span>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    name: 'BaseLogo',
    data () {
        return {
            left: false
        }
    }
}
</script>
<style scoped>
.top-wrapper {
    margin-left: 5%;
    margin-right: 20%;
    margin-top: 5%;
}
.logo-text {
    font-size: 2rem;
    margin: 0;
    color: white;
}
b {
    font-weight: 700;
}
a {
    text-align: center;
    text-decoration: none;
}
</style>
