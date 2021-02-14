<template>
	<v-menu rounded="xl" offset-y persistent :close-on-content-click="false">
		<template v-slot:activator="{ attrs, on }">
			<v-btn
				color="orange lighten-4"
				v-bind="attrs"
				v-on="on"
				rounded
				elevation="0"
			>
				Voir plus
			</v-btn>
		</template>

		<v-list class="text-center">
			<v-card class="mx-auto" max-width="500" outlined>
				<v-list-item three-line>
					<v-list-item-content>
						<div class="overline mb-4">Fiche</div>
						<v-list-item-title class="headline mb-1">
							{{ fiche.profession }}
						</v-list-item-title>
					</v-list-item-content>
					<v-list-item-avatar tile size="80" color="grey">
						<v-img src="/storage/images/producteurs/prod.png"></v-img
					></v-list-item-avatar>
				</v-list-item>
				<v-list-item>
					<v-list-item-content>
						{{ fiche.content }}
					</v-list-item-content>
				</v-list-item>
				<v-list-item-title class="headline mb-1">
					Ses produits
				</v-list-item-title>
				<v-list>
					<template v-slot:activator>
						<v-list-item-content>
							<v-list-item-title> test </v-list-item-title>
						</v-list-item-content>
					</template>

					<v-row align="center" justify="center" class="d-flex flex-column">
						<b-table
							id="my-table"
							:items="products"
							:per-page="perPage"
							:current-page="currentPage"
							striped
							responsive='sm'
							:fields="fields"
						>
							<template #item(idnameimageprixquantite)="data">
								<b>{{ data.item.id }}</b>
							</template>
							<template #cell(image)="data">
								<v-img height="60" width="60" :src="data.value"></v-img>
							</template>
						</b-table>
						<b-pagination
							v-model="currentPage"
							:total-rows="rows"
							:per-page="perPage"
							pills
						></b-pagination>
					</v-row>
				</v-list>
				<v-btn
					color="orange lighten-4 mb-5"
					to="/products"
					rounded
					elevation="0"
				>
					tout les produits
				</v-btn>
			</v-card>
		</v-list>
	</v-menu>
</template>

<script src="./fiche.js" />