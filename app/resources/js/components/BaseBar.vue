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
        name: 'BaseBar',
        data () {
            return {
                left: false
            }
        }
    }
</script>
<style scoped>
    .top-wrapper {
        height: 50px;
        background-image: var(--debricked-gradient);
        box-shadow: 0 5px 2px -2px rgba(0,0,0,.3);
        display: grid;
        align-items: center;
    }
    .logo-text {
        font-size: 1.1875rem;
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
