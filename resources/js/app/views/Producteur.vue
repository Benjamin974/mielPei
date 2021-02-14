<template>
	<v-container>
		<v-row justify="space-between" class="mb-5 mt-5">
			<h1>Producteur {{ producteur.name }}</h1>
			<fiche />
		</v-row>
		<v-data-iterator
			class="mb-10"
			:items="products"
			:items-per-page.sync="itemsPerPage"
			:page="page"
			:search="search"
			:sort-by="sortBy.toLowerCase()"
			:sort-desc="sortDesc"
			hide-default-footer
		>
			<template v-slot:header>
				<v-toolbar elevation="0" class="mb-12">
					<v-text-field
						v-model="search"
						clearable
						flat
						solo-inverted
						hide-details
						prepend-inner-icon="mdi-magnify"
						label="Trouvez un produit"
					></v-text-field>
					<template>
						<v-spacer></v-spacer>
						<v-spacer></v-spacer>

						<formProduct @addProduct="add($event)" />
					</template>
				</v-toolbar>
			</template>

			<template v-slot:default="props">
				<v-row>
					<v-col
						v-for="item in props.items"
						:key="item.id"
						cols="12"
						sm="6"
						md="4"
						lg="3"
					>
						<v-card elevation="1" rounded="xl">
							<v-card-title
								class="subheading font-weight-bold d-flex justify-center"
							>
								<delete :product="item" @deleteProduct="del($event)" />
							</v-card-title>

							<v-divider></v-divider>
							<v-card-title
								class="subheading font-weight-bold d-flex justify-space-between"
							>
								{{ item.name }}
								<formProduct
									:isEdit="true"
									:product="item"
									@updateProduct="update($event)"
								/>
							</v-card-title>

							<v-divider></v-divider>

							<v-list dense>
								<v-list-item v-for="(key, index) in filteredKeys" :key="index">
									<v-list-item-content
										v-if="key != 'image'"
										:class="{ 'blue--text': sortBy === key }"
									>
										{{ key }}:
									</v-list-item-content>
									<v-list-item-content
										class="align-end"
										:class="{ 'blue--text': sortBy === key }"
										v-if="key == 'image'"
									>
										<v-img
											:src="item[key.toLowerCase()]"
											aspect-ratio="1.7"
										></v-img>
									</v-list-item-content>

									<v-list-item-content
										class="align-end"
										v-if="key == 'prix'"
										:class="{ 'blue--text': sortBy === key }"
									>
										{{ item[key.toLowerCase()] }} €
									</v-list-item-content>
									<v-list-item-content
										class="align-end"
										v-if="key == 'quantite'"
										:class="{ 'blue--text': sortBy === key }"
									>
										{{ item[key.toLowerCase()] }}
									</v-list-item-content>
								</v-list-item>
							</v-list>
						</v-card>
					</v-col>
				</v-row>
			</template>
			<template v-slot:footer>
				<v-row class="mt-12 mb-12" align="center" justify="center">
					<v-btn
						fab
						dark
						class="mr-1"
						@click="formerPage"
						color="orange lighten-4"
					>
						<v-icon>mdi-chevron-left</v-icon>
					</v-btn>
					<span class="mr-4 ml-4 grey--text">
						{{ page }} sur {{ numberOfPages }}
					</span>
					<v-btn
						fab
						dark
						color="orange lighten-4"
						class="ml-1"
						@click="nextPage"
					>
						<v-icon>mdi-chevron-right</v-icon>
					</v-btn>
				</v-row>
			</template>
		</v-data-iterator>
		<div v-if='commandes.length != 0'>
			<h1>Les produits commandés</h1>
			<v-sheet
				rounded="rounded"
				class="my-10 pa-5"
				width="100%"
				v-for="(commande, key) in commandes"
				:key="key"
			>
				<livraison :commande='commande' />
			</v-sheet>
		</div>
	</v-container>
</template>
<script src='./producteur.js' />