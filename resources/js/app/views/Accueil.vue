<template>
	<v-container>
		<v-row>
			<v-col class="px-0" md="9">
				<div style=" z-index: 10;" id="map" class="map"></div>
			</v-col>
			<v-col md="3" class="px-0">
				<exploitation :drawer='drawer' :exploiTation='exploiTation' />
			</v-col>
		</v-row>
	</v-container>
</template>
<script src='./accueil.js' />

<style scoped>
.map {
	height: 500px;
	background-color: black;
}
.button {
	color: red;
}
</style>