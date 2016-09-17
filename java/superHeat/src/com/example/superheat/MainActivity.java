package com.example.superheat;


import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class MainActivity extends Activity implements onClickListener {

	
	
	int counter=0;
	
	EditText wb;
	Button cb;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		wb = new EditText(null);
		cb = (Button)findViewById(R.id.button1);
		
		cb.setOnClickListener(new View.OnClickListener() {
			
			public void onClick(View v) {
				counter ++;
				cb.setText("your total clicks are " + counter);
				
			}
		});
	}
	
	

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}
	
	
		
		
		
	}



	



	


