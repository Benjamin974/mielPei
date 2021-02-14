<template>
	<v-menu top>
		<template v-slot:activator="{ on, attrs }">
			<v-btn color="error" depressed v-bind="attrs" v-on="on">
				<v-list-item-title>Le suspendre</v-list-item-title>
			</v-btn>
		</template>

		<v-list>
			<v-list-item>
				<v-list-item-title>
					Voulez vous suspendre ce compte ?
				</v-list-item-title>
			</v-list-item>
			<v-list-item>
				<v-btn color="error" icon>
					<v-icon>mdi-close</v-icon>
				</v-btn>
				<v-btn color="success" @click="suspendre()" icon>
					<v-icon>mdi-check</v-icon>
				</v-btn>
			</v-list-item>
		</v-list>
	</v-menu>
</template>

<script src="./suspendre.js" />