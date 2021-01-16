<template>
	<v-menu rounded="xl" offset-y persistent :close-on-content-click="false">
		<template v-slot:activator="{ attrs, on }">
			<v-btn
				color="amber darken-3"
				v-bind="attrs"
				v-on="on"
				icon
				v-if="!isEdit"
			>
				<v-icon>mdi-plus</v-icon></v-btn
			>
			<v-btn
				color="amber darken-3"
				v-bind="attrs"
				v-on="on"
				icon
				v-if="isEdit"
				@click="edit(product)"
			>
				<v-icon>mdi-playlist-edit</v-icon></v-btn
			>
		</template>

		<v-list class="text-center">
			<v-list-item link>
				<v-list-item-title>
					<v-text-field v-model="name" label="Nom :"></v-text-field>
				</v-list-item-title>
			</v-list-item>
			<v-list-item link>
				<v-list-item-title>
					<v-text-field type='number' min='0' v-model="prix" label="Prix :"></v-text-field>
				</v-list-item-title>
			</v-list-item>
			<v-list-item link>
				<v-list-item-title>
					<v-text-field type='number' min='1' v-model="quantite" label="Quantité :"></v-text-field>
				</v-list-item-title>
			</v-list-item>
			<v-list-item link>
				<v-list-item-title>
					<v-col cols="12" sm="6" md="12">
						<v-file-input v-on:change="onFileChange"></v-file-input>
					</v-col>
					<v-img v-if="!isEdit" :src="image" width="100px" height="100px"></v-img>
					<v-img v-if="isEdit" :src="product.image" width="100px" height="100px"></v-img>
					<br />
					<v-btn icon v-on:click="removeImg">
						<v-icon>mdi-close-circle</v-icon>
					</v-btn>
				</v-list-item-title>
			</v-list-item>
			<v-list-item> </v-list-item>
			<v-card-actions>
				<v-spacer></v-spacer>

				<v-btn icon @click="actions()"> <v-icon>mdi-subdirectory-arrow-right</v-icon></v-btn>
			</v-card-actions>
		</v-list>
	</v-menu>
</template>
<script src="./formProduct.js" />