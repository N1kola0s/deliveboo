<template>
    <div id="loader" class="d-flex flex-column">
        <img id="img-loader" src="/img/loader-hamburger.gif" alt="ciao"/>
    </div>
</template>

<script>
    export default {
        name: 'Loader'
    }
</script>

<style scoped>
#loader {
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: rgba(0, 0, 0, 0.5);
	display: flex;
	align-items: center;
	justify-content: center;
	z-index: 100;
}
#img-loader {
	width: 300px;
	height: 300px;
}
</style>