using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using Dapper;

namespace Escola
{
    public partial class FormAutenticacao : Form
    {
        public FormAutenticacao()
        {
            InitializeComponent();
            // A janela deverá surgir no centro do ecrã
            this.StartPosition = FormStartPosition.CenterScreen;
        }

        private void FormAutenticacao_Load(object sender, EventArgs e)
        {
            this.SuspendLayout();
            this.AcceptButton = BotaoOk;
            this.CancelButton = BotaoCancelar;
            this.Text = "Autenticação";
            this.FormBorderStyle = FormBorderStyle.FixedDialog;
            this.MinimizeBox = false;
            this.MaximizeBox = false;
            LabelFeedback.Visible = false;
            Password.UseSystemPasswordChar = true;
            this.ResumeLayout(false);
        }
    }
}
