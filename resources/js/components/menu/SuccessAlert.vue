<template>
    <div id="messageAlert" class="fixed-top alert alert-success">
        <slot />
    </div>
</template>



<style>
    .fixed-top {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 9999;
        text-align: center;
        transition: 0.3s;
    }
</style>
