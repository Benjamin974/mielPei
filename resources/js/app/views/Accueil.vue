<template>
	<v-container>
		<v-row>
			<v-list-item-title class="display-1 font-weight-bold my-10"> EXPLOITATIONS  </v-list-item-title>
			<v-col cols="12" lg="9" md="12" class="px-0">
				<div style=" z-index: 10;" id="map" class="map"></div>
			</v-col>
			<v-col class="px-0">
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