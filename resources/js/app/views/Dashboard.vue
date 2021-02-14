<template>
	<v-container class="mb-10">
		<h1 class="mb-10">Les utilisateurs</h1>

		<v-row align="center">
			<v-item-group v-model="window" class="shrink mr-6" mandatory tag="v-flex">
				<v-item
					v-for="(user, key) in users"
					:key="key"
					v-slot="{ active, toggle }"
					class="mb-5"
				>
					<div>
						<v-btn :input-value="active" depressed @click="toggle">
							<v-icon>mdi-record</v-icon> {{ user.name }}
						</v-btn>
					</div>
				</v-item>
			</v-item-group>

			<v-col>
				<v-window v-model="window" class="elevation-1" vertical>
					<v-window-item v-for="(user, key) in users" :key="key">
						<v-card flat>
							<v-card-text>
								<v-row class="mb-4" align="center">
									<v-avatar color="grey" class="mr-4"
										><v-img src="/storage/images/producteurs/prod.png"></v-img
									></v-avatar>
									<strong class="title">{{ user.name }}</strong>
									<v-spacer></v-spacer>
									<v-btn v-if='!isEdit' @click="changeUser(user)" icon>
										<v-icon>mdi-account-cog</v-icon>
									</v-btn>
                  <v-btn color='success' v-if='isEdit' @click="updateUser(user)" icon>
										<v-icon>mdi-check</v-icon>
									</v-btn>
                  <v-btn color='error' v-if='isEdit' @click="changeUser(user)" icon>
										<v-icon>mdi-close</v-icon>
									</v-btn>
								</v-row>

								<v-card elevation="0" max-width="1000px" class="mx-auto">
									<v-list two-line>
										<v-list-item>
											<v-list-item-icon>
												<v-icon color="indigo"> mdi-account-question </v-icon>
											</v-list-item-icon>

											<v-list-item-content v-if="!isEdit">
												<v-list-item-title>Role</v-list-item-title>
												<v-list-item-subtitle>{{
													user.role.name
												}}</v-list-item-subtitle>
											</v-list-item-content>
											<v-list-item-content v-if="isEdit">
												<v-select
													v-model="role"
													:items="roles"
													item-text="name"
                          item-value='id'
													label="Role"
												></v-select>
											</v-list-item-content>
										</v-list-item>

										<v-divider inset></v-divider>

										<v-list-item>
											<v-list-item-icon>
												<v-icon color="indigo"> mdi-email </v-icon>
											</v-list-item-icon>

											<v-list-item-content v-if='!isEdit'>
												<v-list-item-title>{{ user.email }}</v-list-item-title>
												<v-list-item-subtitle
													>Email personnel</v-list-item-subtitle
												>
											</v-list-item-content>
											<v-list-item-content v-if='isEdit'>
												<v-text-field
													label="Email"
													v-model="email"
													:rules="emailRules"
													prepend-icon="mdi-account"
													type="text"
												/>
											</v-list-item-content>
										</v-list-item>

										<v-divider inset></v-divider>

										<v-list-item>
											<v-list-item-icon class="mt-7">
												<v-icon v-if='user.banned_until == 0' color="error"> mdi-account-remove-outline </v-icon>
												<v-icon v-if='user.banned_until == 1' color="success"> mdi-account-plus-outline </v-icon>
											</v-list-item-icon>

											<v-list-item-content >
												<suspendre v-if='user.banned_until == 0' :user='user' @suspendre='suspendre($event)'/>
												<rajouter v-if='user.banned_until == 1' :user='user' @rajouter='rajouter($event)'/>
												<v-list-item-subtitle></v-list-item-subtitle>
											</v-list-item-content>
										</v-list-item>
									</v-list>
								</v-card>
							</v-card-text>
						</v-card>
					</v-window-item>
				</v-window>
			</v-col>
		</v-row>
	</v-container>
</template>
<script src="./dashboard.js">