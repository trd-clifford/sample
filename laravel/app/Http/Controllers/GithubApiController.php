<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\GithubApi;

class GithubApiController extends Controller
{
		protected $github;

		public function __construct()
		{
				$this->github= new \App\GithubApi();
		}

		public function action(Request $request) {
				$action = $request->input('action');
				self::$action();
		}
		
		//
		static public function getUserInfo() {
				
				$token = 'faa06655bfbf5d76aaf26a171c495b519e2da4c3';
				$query = '
				{
					repository(owner: "timeriver", name: "rws") {
						issues(last: 100) {
							edges {
								node {
									title
									url
									assignees(first: 5) {
										edges {
											node {
												login
											}
										}
									}
									labels(last: 5) {
										edges {
											node {
												name
											}
										}
									}
								}
							}
						}
					}
				}
				';
				
				$options = [
						'http' => [
								'method' => 'POST',
								'header' => [
										'User-Agent: My User Agent',
										'Authorization: bearer '.$token,
										'Content-type: application/json; charset=UTF-8',
								],
								'content' => json_encode(['query' => $query]),
						],
				];
				$context = stream_context_create($options);
				$contents = file_get_contents('https://api.github.com/graphql', false, $context);
				var_dump(json_decode($contents));
		}

		public function store_github_data(){
			$this->github->save_GithubLogs();
		}
}
