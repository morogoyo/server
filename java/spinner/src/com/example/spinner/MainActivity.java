package com.example.spinner;

import java.util.ArrayList;

import android.support.v7.app.ActionBarActivity;
import android.support.v4.app.Fragment;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends ActionBarActivity {
	
	 ArrayList<String> difficultyLevelOptionsList = new ArrayList<String>();
	 TextView txtView1;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		Spinner spinner = (Spinner) findViewById(R.id.spinner1); 
	    
		  difficultyLevelOptionsList.add("Easy");
		  difficultyLevelOptionsList.add("Medium");
		  difficultyLevelOptionsList.add("Hard");
		  difficultyLevelOptionsList.add("Too Hard");
		 
		  // Create the ArrayAdapter
		  ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(MainActivity.this
		            ,android.R.layout.simple_spinner_item,difficultyLevelOptionsList);
		  
		                 // Set the Adapter
		  spinner.setAdapter(arrayAdapter);
		  
		  // Set the ClickListener for Spinner
		  spinner.setOnItemSelectedListener(new  AdapterView.OnItemSelectedListener() { 

		              public void onItemSelected(AdapterView<?> adapterView, 
		             View view, int i, long l) { 
		             // TODO Auto-generated method stub
		          Toast.makeText(MainActivity.this,"You Selected : "
		           + difficultyLevelOptionsList.get(i)+" Level ",Toast.LENGTH_SHORT).show();
		             
		               }
		                // If no option selected
		    public void onNothingSelected(AdapterView<?> arg0) {
		     // TODO Auto-generated method stub
		          
		    } 

		        });

		

		if (savedInstanceState == null) {
			//getSupportFragmentManager().beginTransaction()
				//	.add(R.id.container, new PlaceholderFragment()).commit();
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {

		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}

	/**
	 * A placeholder fragment containing a simple view.
	 */
	public static class PlaceholderFragment extends Fragment {

		public PlaceholderFragment() {
		}

		@Override
		public View onCreateView(LayoutInflater inflater, ViewGroup container,
				Bundle savedInstanceState) {
			View rootView = inflater.inflate(R.layout.fragment_main, container,
					false);
			return rootView;
		}
	}

}
