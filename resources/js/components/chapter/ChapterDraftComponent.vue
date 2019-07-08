<template>
    <div class="wrap">
        <i class="wrap__text">{{this.content}}</i>
    </div>
</template>

<script>
    export default {
        props: ["content"]
    };
</script>

<style lang="scss">
    .wrap {
        padding: 3px 20px 0px 0px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 5vh;
        &__text {
            position: relative;
            font-size: 1em;
            letter-spacing: 4px;
            overflow: hidden;
            background: linear-gradient(90deg, #000, #fff, #000);
            background-repeat: no-repeat;
            background-size: 80%;
            animation: animate 3s linear infinite;
            -webkit-background-clip: text;
            -webkit-text-fill-color: rgba(255, 255, 255, 0);
        }
    }
    @keyframes animate {
        0% {
            background-position: -500%;
        }
        100% {
            background-position: 500%;
        }
    }
</style>
