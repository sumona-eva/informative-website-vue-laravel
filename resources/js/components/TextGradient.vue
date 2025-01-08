<script setup>

</script>

<template>
    <div class="wrap">
        <h1 class="gradient-text">watermelon</h1>
    </div>
</template>

<style scoped>
*{margin:0;padding:0;}
.wrap{width:100%;}
.gradient-text{
    font-family:"Abril Fatface", sans-serif;
    background: linear-gradient(to right, crimson,pink,springgreen);
    background-size: 200% 200%;
    animation: rainbow 2s ease-in-out infinite;
    background-clip: text;
    -webkit-background-clip:text;
    color:rgba(0,0,0,1);
    font-size:10rem;
    width:80vw;
    margin:30vh auto;
    display:block;
    text-align:center;
    transition: color .2s ease-in-out;
    text-transform:uppercase;
    font-weight:900;
}
.gradient-text:hover{
    color:rgba(0,0,0,0);
}
@keyframes rainbow {
    0%{background-position:left}
    50%{background-position:right}
    100%{background-position:left}
}
</style>
