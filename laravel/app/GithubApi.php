<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class GithubApi extends Model
{


	public function save_GithubLogs()
	{
				$token = '40ef0342b0ef6ce614aa8ad024a811002b57c0ef';
				$owner="trd-clifford";
				$repository="sample";
				$query = '
				{
					repository(owner:"trd-clifford", name: "sample") {
						issues(last: 100) {
							edges {
								node {
									number
									id
									title
									url
									createdAt
									updatedAt
									assignees(last: 50) {
										edges {
											node {
												login
											}
										}
									}
									labels(last: 50) {
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
				$data = json_decode($contents);

				//DB::table('t104_github_logs')->delete();

				foreach ($data->data->repository->issues->edges as $key => $issue) {

					//get issue details
					$issue_number=$issue->node->number;
					$issue_id=$issue->node->id;
					$issue_title=$issue->node->title;
					$issue_url=$issue->node->url;
					date_default_timezone_set('Asia/Manila');
					$created_at=date('Y-m-d H:i:s', strtotime($issue->node->createdAt));
					$updated_at=date('Y-m-d H:i:s', strtotime($issue->node->updatedAt));

					//get issue assigness
					if(empty($issue->node->assignees->edges))
					{
						$assignees="";
					}
					else
					{
						foreach ($issue->node->assignees->edges as $key => $assign) {
							$assignees=implode(', ', array($assign->node->login));
						}//end foreach
					}//end if

					//get issue labels
					if(empty($issue->node->labels->edges))
					{
						$labels="";
					}
					else
					{
						foreach ($issue->node->labels->edges as $key => $label) {
							$labels=implode(', ', array($label->node->name));
						}//end foreach
					}//end if


					$exist=$this->GithubLogs_exists($repository,$issue_id,$updated_at);

							if($exist['exist']==true){

									if($exist['has_update']==true)

									{
										DB::table('t104_github_logs')
										->where('repository_name', '==', $repo_name)
										->where('issue_id', '==', $issue_id)
										->update([
											'repository_owner' => $owner,
											'repository_name' => $repository,
											'issue_id' => $issue_number,
											'issue_title' => $issue_title,
											'issue_url' => $issue_url,
											'assignees' => $assignees,
											'labels' => $labels,
											'created_at' => $created_at,
											'updated_at' => $updated_at
											]);
									}

							}
							else
							{

								//save new data in database
								DB::table('t104_github_logs')->insert([
									'repository_owner' => $owner,
									'repository_name' => $repository,
									'issue_id' => $issue_number,
									'issue_title' => $issue_title,
									'issue_url' => $issue_url,
									'assignees' => $assignees,
									'labels' => $labels,
									'created_at' => $created_at,
									'updated_at' => $updated_at
								]);

							}//close if exist


				}//end parent foreach

	}//close save_GithubLogs function

	public function GithubLogs_exists($repo_name,$issue_id,$updated_at){
		
			$result = DB::table('t104_github_logs')
				->select('*')
				->where('repository_name', '==', $repo_name)
				->where('issue_id', '==', $issue_id)
				->get();

			if ($result->count()>0) {

				$exist=true;

						foreach ($result as $key => $value) {

							//check if has updates
							if($value->updated_at==$updated_at)
							{
								$has_update=true;
							}
							else
							{
								$has_update=false;
							}

						}//end foreach

			}
			else{
				$exist=false;
				$has_update=false;
			}//end if

			return(compact('has_update','exist'));

	}//close check_updated_issues Function

}
